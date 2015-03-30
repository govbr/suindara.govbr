<?php
App::uses('Controller', 'Controller');
App::uses('ConnectionManager', 'Model');
App::uses('File', 'Utility');

class InstallController extends Controller
{
    public $name = 'Install';
    public $uses = false;

    public $components = array('Session');

    public $helpers = array(
        'Html',
         'Form' => array(
             'className' => 'Instalar.BootstrapForm',
         ),
    );


    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    private function _changeConfiguration($key, $value, $path = null)
    {
        if (!$path) {
            $path = CONFIG . 'core.php';
        }

        $file = new File($path);
        $contents = $file->read();
        $contents = preg_replace('/(?<=Configure::write\(\''.$key.'\', \')([^\' ]+)(?=\'\))/', $value, $contents);

        if ($file->write($contents)) {
            return $value;
        }

        return false;
    }

    private function _generateSecurity() {
        $salt = $this->_changeConfiguration('Security.salt', Security::generateAuthKey());
        $seed = $this->_changeConfiguration('Security.cipherSeed', mt_rand() . mt_rand());
        
        if (!$salt || !$seed) { 
            $this->Session->setFlash('Ops, não foi possível gerar os códigos de segurança.', 'error');    
            return false;
        }

        return true;
    }

    private function _createDB()
    {

        $db = ConnectionManager::getDataSource('default');
        $files = array('cms3.sql', 'inserts.sql');

        foreach ($files as $filename)
        {

            $file = new File(CONFIG . 'Schema' . DS . $filename);
            if ($file->exists()) {
                $content = $file->read();
                $file->close();
            } else {
                $this->Session->setFlash("Ops, não foi possível achar o arquivo {$filename}. Verifique se o arquivo existe.", 'error');
                return false;
            }

            if ($filename == $files[0])
            {
                if (!$db->query($content))
                {
                    $this->Session->setFlash('Ops, não foi possível criar as tabelas no Banco de Dados. Verifique se o BD está rodando.');
                    return false;
                }
            }
            else
            {   
               if (!$db->execute($content))
               {
                   $this->Session->setFlash('Ops, não foi possível popular o Banco de dados. Verifique se o BD está rodando.'); 
                   return false;
               }
            }

        }

           return true;
    }

    public function index()
    {
        $this->set('title_for_layout', 'Passo 1: Verificação do Ambiente');
    }

    public function database()
    {
        $this->set('title_for_layout', 'Passo 2: Conexão e Criação do Banco de Dados');

        if ($this->request->is('post')) {
            $data = array(
                'Install' => $this->request->data,
            );
            
            $config = array(
                'name' => 'default',
                'datasource' => 'Database/Mysql',
                'persistent' => false,
                'host' => 'localhost',
                'login' => 'root',
                'password' => '',
                'database' => 'cms3',
                'schema' => null,
                'prefix' => null,
                'encoding' => 'utf8',
                'port' => null,
            );

            foreach ($data['Install'] as $key => $value) {
                if (isset($data['Install'][$key])) {
                    $config[$key] = $value;
                }
            }

            $result = true;

            if (copy(CONFIG . 'database.php.install', CONFIG . 'database.php')) {
                $file = new File(CONFIG . 'database.php', true);
                $content = $file->read();
            } else {
                $this->Session->setFlash('Ops, não foi possível achar o arquivo "app/Config/database.php.install". Verifique se o arquivo existe.', 'error');
                $result = false;
            }
            
            foreach ($config as $configKey => $configValue) {
                $content = str_replace('{default_' . $configKey . '}', $configValue, $content);
            }

            if (!$file->write($content)) {
               $this->Session->setFlash('Ops, não foi possível escrever o arquivo "database.php".', 'error');
               $result = false;
            }

            $db = null;

            try {
                ConnectionManager::create('default', $config);
                $db = ConnectionManager::getDataSource('default');
            } catch (MissingConnectionException $e) {
                $this->Session->setFlash('Ops, ocorreu um erro com o banco de dados: ' . $e->getMessage(), 'error');
                $result = false;
            }

            if (!$db->isConnected()) {
                $this->Session->setFlash('Ops, não foi possível conectar ao banco de dados.', 'error');
                $result = false;
            }
            
            if ($result && $this->_createDB()) {
                $this->redirect(Router::url('/instalar/adminuser', true));
            }
        }
    }

    public function adminuser()
    {
        $this->set('title_for_layout', 'Passo 3: Criação do Usuário Administrador');

        if ($this->request->is('post')) {
            $this->loadModel('Usuarios.Usuario');
            $this->request->data['Usuario']['root'] = 1; // Root ativo
            $this->request->data['Usuario']['modo_sistema'] = 0;

            
            try 
            {
                $db = ConnectionManager::getDataSource('default');
                $user = $this->request->data['Usuario'];

                $user['domain'] = preg_replace("/(^[a-z]*\:\/\/)(.*)(\/$)/", '$2', Router::url('/', true));
                // $domainT = explode('/', $user['domain']);
                //$user['domain'] = $domainT[0];
                //pr ($user['domain']);

                $user['senha'] = AuthComponent::password($user['senha']);

                $fileAdmin = new File(CONFIG . 'Schema' . DS . 'admin_user.sql');
                
                if (!$fileAdmin->exists())
                {
                    throw new Exception("Ops, admin_user.sql não encontrado");
                }
                
                $content = $fileAdmin->read();
                foreach ($user as $key => $value)
                {
                    $content = preg_replace("/\{{$key}\}/", $value, $content);
                }

               
                if (!$db->query($content))
                {

                    // Salvar site modelo
                    $file = new File(CONFIG . 'Schema' . DS . 'site_modelo.sql');

                    if ($file->exists()) 
                    {
                        $db->query($file->read());    
                    }
                    else
                    {
                        $this->setFlash('Ops, ocorreu um erro ao gerar dos dados do site modelo. Verifique os dados e tente novamente.', 'error'); 
                    }
                    

                    $this->redirect(Router::url('/instalar/finish', true));    
                }
                else 
                {
                   $this->setFlash('Ops, ocorreu um erro. Verifique os dados e tente novamente.', 'error'); 
                }
                
            }
            catch (Exception $e)
            {
                $this->Session->setFlash('Ops, não foi possível completar a criação do usuário administrador (' . $e->getMessage() . ')',
                                         'error');   
            }

            
        }
    }

    public function finish()
    {
        $this->set('title_for_layout', 'Passo 4: Finalização');

        if (!$this->_changeConfiguration('Database.installed', 'true', PLUGIN_CONFIG . 'bootstrap.php')) {
            $this->Session->setFlash(__('Ops, não foi possível modificar a chave "Database.installed" no arquivo "app/Plugin/Install/Config/bootstrap.php".'), 'error');
        }
    }
}