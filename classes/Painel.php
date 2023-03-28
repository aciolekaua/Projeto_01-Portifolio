<?php 
    namespace Classes;
    use PDO;
    class Painel {

        public static $cargos = array('0' => 'Normal','1' => 'Sub Admin', '2' => 'Admin');

        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
            setcookie('lembrar','true',time()-1,'/');
            session_destroy();
            header('Location: '.INCLUDE_PATH_PAINEL);
        }


        public static function carregarPagina() {
            if(isset($_GET['url'])) {
                $url = explode('/',$_GET['url']);
                if(file_exists('pages/'.$url[0].'.php')){
                    include('pages/'.$url[0].'.php');
                } else {
                    //Pagina não existe
                    header('Location: '.INCLUDE_PATH_PAINEL);
                }
            } else {
                include('pages/home.php');
            }
        }

        public static function listarUsuariosOnline() {
            self::limparUsuariosOnline();
            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_online`");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function limparUsuariosOnline() {
            $data = date('Y-m-d H:i:s');
            $sql = MySql::conectar()->exec("DELETE FROM `tb_admin_online` WHERE ultima_acao < '$data' - INTERVAL 2 MINUTE");
        }

        public static function alerta($tipo,$mensagem) {
            if($tipo == 'sucesso') {
                echo '<div class="box-alert sucesso"><i class="fa-solid fa-check"></i> '.$mensagem.'</div>';
            } elseif ($tipo == 'erro') {
                echo '<div class="box-alert erro"><i class="fa-solid fa-xmark"></i> '.$mensagem.'</div>';
            }
        }

        public static function imagemValida($imagem){
            if($imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/png') {

                $tamanho = intval($imagem['size'] / 1024);
                if($tamanho < 300) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public static function atualizarArquivo($file){
            $formatarArquivo = explode('.',$file['name']);
            $imagemNome = uniqid().'.'.$formatarArquivo[count($formatarArquivo) - 1];
            if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$file['name'])) {
                return $imagemNome;
            } else {
                return false;
            }
        }

        public static function deleteArquivo($file){
            @unlink('uploads/'.$file);
            echo $file;
        }
    }
?>
