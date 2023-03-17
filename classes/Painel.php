<?php 
    namespace Classes;
    use PDO;
    class Painel {
        public static function logado(){
            return isset($_SESSION['login']) ? true : false;
        }

        public static function loggout(){
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
    }
?>
