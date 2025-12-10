@extends('layouts.layout')
@section('title','Termos de Uso e Privacidade')
@section('head')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/LGPD/style.css') }}">
<style>
    .area-header {
        min-height: 0 !important;
        height: auto !important;
        background-color: #a4a48d;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    nav#menu {
        display: none;
    }
    section.page-terms .menu {
        top: 130px;
        background: #666652;
        color: #fff;
        border-color: #a4a48d;
    }
    section.page-terms .menu a:before,
    main h1:after {
        background: #a4a48d;
    }
    section.page-terms {
        padding-top: 1rem;
        background: #f1f1f1;
        color: #2e2d2d;
        font-weight: 500;
    }
    section.page-terms .top-info h3 {
        color: #2e2d2d;
        margin-bottom: 1rem;
        font-weight: 500;
    }
    main article {
        border-color: #a4a48d;
    }
    article form .group-button button {
        background: #a4a48d;
        color: #fff;
    }
    article form .group-button button:hover {
        transition: .3s;
        background: #666652;
    }
    section.page-terms .top-info {
        padding: 0 1rem;
    }
    main article:first-child {
        padding-top: 10px;
    }
    main article {
        padding-bottom: 50px;
    }
</style>
@endsection
@section('content')
<section class="page-terms">
    <div class="content">
        <div class="top-info">
            <h1>Termos de Uso e Privacidade</h1>
            <h3>Última atualização: <span>24/09/2025</span></h3>
        </div>
        <ul class="menu">
            <a href="#section_1" class="section_1">Política de privacidade</a>
            <a href="#section_2" class="section_2">Termos de uso</a>
            <a href="#section_3" class="section_3">Cookies</a>
            <a href="#section_4" class="section_4">Cancelar cadastro</a>
        </ul>
        <br>
        <main>
            <div class="content">
                <div class="wrapper">
                    <article id="section_1">
                        <h1>Política de privacidade</h1>
                        <div class="text-wrapper">

                            <p>A sua privacidade é importante para nós. É política da <strong> {{ getItem('client') }}</strong> respeitar a sua privacidade em relação a qualquer informação sua que possamos coletar em nosso site e outros sites que possuímos e operamos.</p>

                            <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço. Fazemos por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que estamos coletando e como será usado.

                            <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis para evitar perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.

                            <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando exigido por lei.

                            <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas respectivas políticas de privacidade.

                            <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos fornecer alguns dos serviços desejados.

                            <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações pessoais, <a href="{{ getItem('link-whats1') }}" target="_blank">entre em contato conosco</a>.
                        </div>
                    </article>
                    <article id="section_2">
                        <h1>Termos de uso</h1>
                        <div class="text-wrapper">
                            <h2>1. Termos</h2>

                            <p>Ao acessar ao site <strong> {{ getItem('client') }}</strong>, concorda em cumprir estes termos de serviço, todas as leis e regulamentos aplicáveis e concorda que é responsável pelo cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum desses termos, está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos pelas leis de direitos autorais e marcas comerciais aplicáveis.</p>

                            <h2>2. Uso de licença</h2>

                            <p>
                                É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou software) no site <strong> {{ getItem('client') }}</strong>, apenas para visualização transitória pessoal e não comercial. Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, você não pode:
                            </p>

                            <ul>
                                <li>Modificar ou copiar os materiais;</li>
                                <li>Usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou não comercial); </li>
                                <li>Tentar descompilar ou fazer engenharia reversa de qualquer software contido no site <strong> {{ getItem('client') }}</strong>;</li>
                                <li>Remover quaisquer direitos autorais ou outras notações de propriedade dos materiais;</li>
                                <li>Transferir os materiais para outra pessoa ou 'espelhe' os materiais em qualquer outro servidor.</li>
                                <li>Esta licença será automaticamente rescindida se você violar alguma dessas restrições e a qualquer momento pela <strong> {{ getItem('client') }}</strong>. Ao encerrar a visualização desses materiais ou após o término desta licença, você deve apagar todos os materiais baixados em sua posse, seja em formato eletrônico ou impresso.</li>
                            </ul>

                            <h2>3. Isenção de responsabilidade</h2>

                            <p>
                                Os materiais no site da <strong> {{ getItem('client') }}</strong> são fornecidos 'como estão'. Nós não oferecemos garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização, adequação a um fim específico ou não violação de propriedade intelectual ou outra violação de direitos. Além disso, a <strong> {{ getItem('client') }}</strong> não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ou à confiabilidade do uso dos materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.
                            </p>

                            <h2>4. Limitações</h2>

                            <p>
                                Em nenhum caso a <strong> {{ getItem('client') }}</strong> ou seus fornecedores serão responsáveis por quaisquer danos (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos negócios) decorrentes do uso ou da incapacidade de usar os materiais em <strong> {{ getItem('client') }}</strong>, mesmo que a agência ou um representante autorizado tenha sido notificado oralmente ou por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em garantias implícitas, ou limitações de responsabilidade por danos consequentes ou incidentais, essas limitações podem não se aplicar a você.
                            </p>

                            <h2>5. Precisão dos materiais</h2>

                            <p>
                                Os materiais exibidos no site da <strong> {{ getItem('client') }}</strong> podem incluir erros técnicos, tipográficos ou fotográficos. Não garantimos que qualquer material em nosso site seja preciso, completo ou atual. Podemos fazer alterações nos materiais contidos em nosso site a qualquer momento, sem aviso prévio. No entanto, a <strong> {{ getItem('client') }}</strong> não se compromete a atualizar os materiais.
                            </p>

                            <h2>6. Links</h2>

                            <p>
                                A <strong> {{ getItem('client') }}</strong> não analisou todos os sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por nós do site. O uso de qualquer site vinculado é por conta e risco do usuário.
                            </p>

                            <h2>7. Modificações</h2>

                            <p>
                                A <strong> {{ getItem('client') }}</strong> pode revisar estes termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de serviço.
                            </p>

                            <h2>8. Lei aplicável</h2>

                            <p>
                                Estes termos e condições são regidos e interpretados de acordo com as leis da <strong> {{ getItem('client') }}</strong> e você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou localidade.
                            </p>

                        </div>
                    </article>
                    <article id="section_3">
                        <h1>Cookies</h1>

                        <div class="text-wrapper">
                            <h2>O que são cookies?</h2>
                            <p>
                                Como é prática comum em quase todos os sites profissionais, este site usa cookies, que são pequenos arquivos baixados no seu computador para melhorar sua experiência. Esta página descreve quais informações eles coletam, como as usamos e por que às vezes precisamos armazenar esses cookies. Também compartilharemos como você pode impedir que esses cookies sejam armazenados, no entanto, isso pode fazer o downgrade ou 'quebrar' certos elementos da funcionalidade do site.
                            </p>

                            <h2>Como usamos os cookies?</h2>
                            <p>
                                Utilizamos cookies por vários motivos, detalhados abaixo. Infelizmente, na maioria dos casos, não existem opções padrão do setor para desativar os cookies sem desativar completamente a funcionalidade e os recursos que eles adicionam a este site. É recomendável que você deixe todos os cookies se não tiver certeza se precisa ou não deles, caso sejam usados para fornecer um serviço que você usa.
                            </p>

                            <h2>Desativar cookies</h2>
                            <p>
                                Você pode impedir a configuração de cookies ajustando as configurações do seu navegador (consulte a ajuda do navegador para saber como fazer isso). Esteja ciente de que a desativação de cookies afetará a funcionalidade deste e de muitos outros sites que você visita. A desativação de cookies geralmente resultará na desativação de determinadas funcionalidades e recursos deste site. Portanto, é recomendável que você não desative os cookies.
                            </p>

                            <h2>Cookies que definimos</h2>
                            <p>
                                <strong>1. Cookies relacionados a boletins por e-mail ou whatsApp</strong>
                            </p>

                            <p>
                                Este site oferece serviços de boletins informativos via e-mail ou whatsApp e os cookies podem ser usados para lembrar se você já está registrado e se deve mostrar determinadas notificações válidas apenas para usuários cadastrados/não cadastrados.
                            </p>

                            <p><strong>2. Cookies relacionados a formulários</strong></p>

                            <p>Quando você envia dados por meio de um formulário como os encontrados nas páginas deste site, os cookies podem ser configurados para lembrar os detalhes do usuário para correspondência futura.</p>

                            <p>
                                <strong>3. Cookies de preferências do site</strong>
                            </p>

                            <p>Para proporcionar uma ótima experiência neste site, fornecemos a funcionalidade para definir suas preferências de como esse site é executado quando você o usa. Para lembrar suas preferências, precisamos definir cookies para que essas informações possam ser chamadas sempre que você interagir com uma página for afetada por suas preferências.</p>

                            <p><strong>4. Cookies de terceiros</strong></p>

                            <p>
                                Em alguns casos especiais, também usamos cookies fornecidos por terceiros confiáveis. Por exemplo, este site usa o Google Analytics, que é uma das soluções de análise mais difundidas e confiáveis da Web para nos ajudar a entender como você usa o site e como podemos melhorar sua experiência. Esses cookies podem rastrear itens como quanto tempo você gasta no site e as páginas visitadas para que possamos continuar produzindo conteúdo atraente. Periodicamente, testamos novos recursos e fazemos alterações sutis na maneira como o site se apresenta. Quando ainda estamos testando novos recursos, esses cookies podem ser usados para garantir que você receba uma experiência consistente enquanto estiver no site, entendendo quais otimizações os nossos usuários mais apreciam. Para mais informações sobre cookies do Google Analytics, consulte a página oficial, <a href="https://support.google.com/analytics/answer/11397207?hl=pt-br" target="_blank" title="Clique para mais informações">clicando aqui</a>.
                            </p>

                            <p><strong>Compromisso do  usuário</strong></p>

                            <p>
                                O usuário se compromete a fazer uso adequado dos conteúdos e da informação que a <strong> {{ getItem('client') }}</strong> oferece no site e com caráter enunciativo, mas não limitativo:
                            </p>

                            <ol>

                                <li>Não se envolver em atividades que sejam ilegais ou contrárias à boa fé a à ordem pública;</li>

                                <li>Não divulgar conteúdo ou propaganda de natureza racista, xenofóbica, apostas desportivas, pornografia ilegal, de apologia ao terrorismo ou contra os direitos humanos;</li>

                                <li>Não causar danos aos sistemas físicos (hardwares) e lógicos (softwares) da <strong> {{ getItem('client') }}</strong>, de seus fornecedores ou terceiros para introduzir ou disseminar vírus informáticos ou quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos anteriormente mencionados.</li>

                            </ol>

                            <p>
                                <strong>Mais informações</strong>
                            </p>

                            <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos que você usa em nosso site.</p>

                        </div>
                    </article>
                    <article id="section_4">
                        <h1>Cancelar cadastro</h1>
                        <p>Ao preencher o formulário e enviar, você irá remover seus dados do nosso sistema.</p>
                        <form action="{{ route('lgpd.destroy') }}" method="post">
                            @csrf
                            <div class="col-2">
                                <div class="group-input">
                                    <label for="nome-terms">Nome</label>
                                    <input id="nome-terms" type="text" name="nome">
                                </div>
                                <div class="group-input">
                                    <label for="sobrenome-terms">Sobrenome</label>
                                    <input id="sobrenome-terms" type="text" name="sobrenome">
                                </div>
                            </div>
                            <div class="group-input">
                                <label for="email-terms">E-mail</label>
                                <input id="email-terms" type="email" name="email">
                            </div>
                            <div class="group-input">
                                <label for="telephone-terms">WhatsApp</label>
                                <input class="input-whatsapp" id="telephone-terms" type="text" name="telephone" maxlength="15">
                            </div>
                            <input id="nome-terms" type="hidden" name="form_type" value="whatsapp">
                            <div class="group-button">
                                <button type="submit">Enviar</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </main>
    </div>
   
    <div class="backToTop">
        <p>
            <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m11.998 21.995c5.517 0 9.997-4.48 9.997-9.997 0-5.518-4.48-9.998-9.997-9.998-5.518 0-9.998 4.48-9.998 9.998 0 5.517 4.48 9.997 9.998 9.997zm0-1.5c-4.69 0-8.498-3.807-8.498-8.497s3.808-8.498 8.498-8.498 8.497 3.808 8.497 8.498-3.807 8.497-8.497 8.497zm4.845-6.711c.108.141.157.3.157.456 0 .389-.306.755-.749.755h-8.501c-.445 0-.75-.367-.75-.755 0-.157.05-.316.159-.457 1.203-1.554 3.252-4.199 4.258-5.498.142-.184.36-.29.592-.29.23 0 .449.107.591.291zm-7.564-.289h5.446l-2.718-3.522z" fill-rule="nonzero"/></svg>
            <span>TOPO</span>
        </p>
    </div>
</section>
@endsection
@section('scripts')
<script>
        const sections = document.querySelectorAll('article');
        const all_options_sections = document.querySelectorAll('section.page-terms .menu a');
        let isScrolling = false; // Flag para evitar conflitos durante a rolagem programática

        // Função para atualizar a seção ativa
        function updateActiveSection() {
            if (isScrolling) return; // Ignora se estiver rolando programaticamente

            let currentSection = null;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                const scrollPosition = window.scrollY;

                if (scrollPosition >= sectionTop - sectionHeight / 2 && scrollPosition < sectionTop + sectionHeight / 2) {
                    currentSection = section;
                }
            });

            sections.forEach(section => section.classList.remove('active'));
            all_options_sections.forEach(option => option.classList.remove('active'));

            if (currentSection) {
                currentSection.classList.add('active');
                const activeOption = document.querySelector(`section.page-terms .menu a.${currentSection.id}`);
                if (activeOption) {
                    activeOption.classList.add('active');
                }
            } else {
                // Se nenhuma seção está ativa, ativa o primeiro item do menu
                all_options_sections[0].classList.add('active');
            }
        }

        // Evento de scroll
        document.addEventListener('scroll', () => {
            if (!isScrolling) {
                updateActiveSection();
            }
        });

        // Evento de clique nos links
        all_options_sections.forEach(option => {
            option.addEventListener('click', (e) => {
                e.preventDefault(); // Impede o comportamento padrão do link
                const targetId = option.getAttribute('href').substring(1); // Remove o '#'
                const targetSection = document.getElementById(targetId);

                if (targetSection) {
                    isScrolling = true; // Ativa a flag de rolagem programática
                    targetSection.scrollIntoView({ behavior: 'smooth' });

                    // Remove a classe 'active' de todas as seções e links
                    sections.forEach(section => section.classList.remove('active'));
                    all_options_sections.forEach(opt => opt.classList.remove('active'));

                    // Adiciona a classe 'active' à seção e link clicados
                    targetSection.classList.add('active');
                    option.classList.add('active');

                    // Desativa a flag após a rolagem suave
                    setTimeout(() => {
                        isScrolling = false;
                    }, 500); // Ajuste o tempo conforme necessário
                }
            });
        });

        // Atualiza a seção ativa ao carregar a página
        updateActiveSection();
    </script>
    <script>
        const btn_scroll_top = document.querySelector('.backToTop')
        const top_section = document.querySelector('section.page-terms')
        btn_scroll_top.addEventListener('click', function(){
            top_section.scrollIntoView({ behavior: 'smooth' });
        })
    </script>
@endsection