<?php

    /*
    public $sslForce = false;

    function sslForce($url)
    {
        if($this->sslForce)
            return str_replace('http','https', $url);

        return $url;

    }
    */

    function getPage() {
        $url = $_SERVER['REQUEST_URI'];
        $explode = explode('/',$url);
        $page = end($explode);

        return $page;
    }

    // FUNÇÃO PARA RETORNAR DADOS CONSTANTES NO SITE
    function getItem($data)
    {
        $array = array(

            'APP_URL_ARTICLES' => 'http://127.0.0.1:8081/adm/acompanhe/',

            //client
            'client' => 'Fátima Teixeira',
            'email-client' => 'contato@fatimateixeira.com.br',
            'subjectMail' => 'Subject',

            // whats number
            'link-whats1' => "https://wa.me/5511996075942?text=Ol%C3%A1%2C%20estou%20precisando%20de%20um%20contato%20com%20advogado.",
            'whats1' =>  "(11) 99607-5942",
            'link-whats2' => "https://api.whatsapp.com/send?phone=5511",
            'whats2' => '',

            // telefones numner
            'link-phone1' => 'tel:+551112334455',
            'phone1' => '(XX) XXXX-XXXX',
            'link-phone2' => 'tel:+551112334455',
            'phone2' => '(XX) XXXX-XXXX',

            // social medias
            'linkedin' => 'https://www.linkedin.com/company/',
            'name_linkedin' => 'usuario do cliente',
            'link-facebook' => 'https://web.facebook.com/url do cliente/',
            
            'link-instagram1' => 'https://www.instagram.com/vanessagmunis/',
            'instagram1' => 'vanessagmunis',

            'link-youtube' => 'https://www.youtube.com.br/',
            'link-pinterest' => 'https://br.pinterest.com/',
            'email' => 'contato@cliente.com',
            'acomp-image-resolution' => '200 x 200' ,
            'equipe-image-resolution' => '200 x 200' ,

            'link-address' => 'https://maps.app.goo.gl/49guTwRFBV1ZBaXe7',
            'address' => 'Rua Lincoln de Albuquerque, 259 <br>8º andar - Conjunto 82 <br>CEP 05004-010 - Perdizes <br>São Paulo / SP',
            'iframe-address' => '<iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.9972266392074!2d-46.67010768856845!3d-23.532602160448903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce57e1c6f1d323%3A0x5c0ceea3b8a64c69!2sClilton%20Guimar%C3%A3es%20Advocacia!5e0!3m2!1spt-BR!2sbr!4v1758658073208!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        );

        if (isset($array[$data]))
            return $array[$data];

        return "nada encontrado";
    }

    // FUNÇÃO PARA MOSTRAR O MES EM STRING
    function showMonth($mes)
    {
        switch($mes) {
            case 1:
                $dateValue = "Janeiro";
                break;

            case 2:
                $dateValue = "Fevereiro";
                break;

            case 3:
                $dateValue = "Março";
                break;

            case 4:
                $dateValue = "Abril";
                break;

            case 5:
                $dateValue = "Maio";
                break;

            case 6:
                $dateValue = "Junho";
                break;

            case 7:
                $dateValue = "Julho";
                break;

            case 8:
                $dateValue = "Agosto";
                break;

            case 9:
                $dateValue = "Setembro";
                break;

            case 10:
                $dateValue = "Outubro";
                break;

            case 11:
                $dateValue = "Novembro";
                break;

            case 12:
                $dateValue = "Dezembro";
                break;
        }
        if($mes != null)
            return $dateValue;

        return "A váriavel está vazia";

    }

    // FUNÇÃO PARA MOSTRAR O DIA EM STRING
    function showDay($day)
    {
        $date = $day;
        $dateFinal = substr($date, 0, 2);
        return $dateFinal;
    }

    function showYear($day)
    {
        $date = $day;
        $dateFinal = substr($date, 6, 4);
        return $dateFinal;
    }

    // FUNÇÃO PARA FORMATAR URL PARA URL AMIGÁVEL
    function cleanUrl($title)
    {
        // Convert the title to lowercase and replace accented characters
        $url = mb_strtolower($title, 'UTF-8');
        $url = str_replace(
            ['á', 'à', 'ã', 'â', 'ä', 'é', 'è', 'ê', 'ë', 'í', 'ì', 'î', 'ï', 'ó', 'ò', 'õ', 'ô', 'ö', 'ú', 'ù', 'û', 'ü', 'ñ', 'ç'],
            ['a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'n', 'c'],
            $url
        );

        // Remove special characters and punctuation
        $url = preg_replace('/[^a-z0-9\s-]/', '', $url);

        // Replace spaces with hyphens
        $url = str_replace(' ', '-', $url);

        // Remove duplicate hyphens
        $url = preg_replace('/-+/', '-', $url);


        // Trim any leading or trailing hyphens
        $url = trim($url, '-');

        return $url;
    }


    // FUNÇÃO PARA TIRAR OS SEGUNDOS DA HORA
    function noSeg($time)
    {
        $time = explode(":", $time);
        list($hora, $min, $seg) = $time;

        return $hora.':'.$min;
    }

    // FUNÇÕES PARA EXIBIR TIPOS DIFERENTES DE DATAS
    if (!function_exists('formatDate')) {
        function formatDate($data, $tipo) {
            // Se a data estiver vazia ou nula, retorne vazio imediatamente
            if (empty($data)) {
                return '';
            }

            $carbonDate = null;

            // Tenta parsear no formato d/m/Y H:i (se a data também incluir hora)
            try {
                $carbonDate = \Carbon\Carbon::createFromFormat('d/m/Y H:i', $data);
            } catch (\Exception $e) {
                // Se falhar, tenta parsear no formato d/m/Y (apenas data)
                try {
                    $carbonDate = \Carbon\Carbon::createFromFormat('d/m/Y', $data);
                } catch (\Exception $e) {
                    // Se ainda falhar, tenta parsear no formato Y-m-d (padrão HTML input type="date")
                    try {
                        $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d', $data);
                    } catch (\Exception $e) {
                        // Se todas as tentativas falharem, tenta Carbon::parse() como fallback geral
                        try {
                            $carbonDate = \Carbon\Carbon::parse($data);
                        } catch (\Exception $e) {
                            return ''; // Retorna vazio se a data for completamente inválida
                        }
                    }
                }
            }

            // Se conseguiu criar um objeto Carbon
            if ($carbonDate) {
                $dia = $carbonDate->format('d');
                $mes = $carbonDate->format('m');
                $ano = $carbonDate->format('Y');

                switch ($tipo) {
                    case 1: // YYYY-MM-DD
                        return $ano . '-' . $mes . '-' . $dia;
                    case 2: // DD-MM-YYYY
                        return $dia . '-' . $mes . '-' . $ano;
                    case 3: // DD MêsAbrev YYYY
                        $mesExtenso = showMonth($mes);
                        return $dia . ' ' . mb_substr($mesExtenso, 0, 3) . ' ' . $ano;
                    case 4: // DD MêsExtenso YYYY
                        $mesExtenso = showMonth($mes);
                        return $dia . ' ' . $mesExtenso . ' ' . $ano;
                    case 5: // DD de MêsExtenso de YYYY
                        $mesExtenso = showMonth($mes);
                        return $dia . ' de ' . $mesExtenso . ' de ' . $ano;
                    default:
                        return $carbonDate->format('d/m/Y'); // Retorna d/m/Y por padrão se tipo não reconhecido
                }
            }

            return ''; // Fallback final se algo inesperado acontecer
        }
    }

    // FUNÇÃO PARA LIMITAR QUANTIDADE DE CARACTERES NA PÁGINA //
    function limitString($string,$limit)
    {
        // Converte a string para UTF-8, se necessário
        $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');

        // Verifica o comprimento da string e realiza o corte
        return (mb_strlen($string, 'UTF-8') > $limit) 
            ? mb_substr($string, 0, $limit, 'UTF-8') . '...' 
            : $string;

    }

    // FUNÇÃO PARA CONVERTER DATA E HORA PARA TIMESTAMP
    function toTimestamp($date, $time)
    {
        $dataForm = formatDate($date, 1);

        return strtotime($dataForm." ".$time);

    }

    // FUNÇÃO PARA EXIBIR O TEMPO CORRIDO
    function runningTime($dateTime)
    {
        // data e hora atual
        $now = strtotime(date('Y/m/d H:i:s'));
        $time = strtotime($dateTime);
        $diff = $now - $time;

        // quebrando
        $seconds = $diff;
        $minutes = round($diff / 60);
        $hours = round($diff / 3600);
        $days = round($diff / 86400);
        $weeks = round($diff / 604800);
        $months = round($diff / 2419200);
        $years = round($diff / 29030400);

        // exibindo a diferencia de tempo
        if ($seconds <= 60) return "1 min atrás";
        else if ($minutes <= 60) return $minutes==1 ?'1 min atrás':$minutes.' min atrás';
        else if ($hours <= 24) return $hours==1 ?'1 hrs atrás':$hours.' hrs atrás';
        else if ($days <= 7) return $days==1 ?'1 dia atras':$days.' dias atrás';
        else if ($weeks <= 4) return $weeks==1 ?'1 semana atrás':$weeks.' semanas atrás';
        else if ($months <= 12) return $months == 1 ?'1 mês atrás':$months.' meses atrás';
        else return $years == 1 ? 'um ano atrás':$years.' anos atrás';
    }