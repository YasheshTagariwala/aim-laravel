        <header> 
                        <?php $is_login = Session::get('is_login'); ?>           
            <nav class="navbar navbar-fixed-top" role="navigation">               
                <div class="col-lg-4 col-md-4 col-sm-3">
                    <div class="navbar-header navbrand_1">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> 
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
                        </button>
                    </div>
                    <a class="navbar-brand" href="{{url('/home')}}"><img src="{{url('/')}}/assets_new/images/logo.png" align="GYBI" /></a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-9">
                    <div class="row">
                        <div class="bg-nav">
                            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                                <div class="navbar-left">
                                    <ul class="nav navbar-nav nav-small">  
                                        @if($is_login == 1)              
                                        <li><a href="{{url('/market-place')}}">Market Place</a></li>   
                                        @endif     
                                        <li><a href="{{url('/org-list')}}">Organizations</a></li>
                                        <li><a href="{{url('/contact')}}">Contact Us</a></li>
                                        <!--li>
                         <select onchange="doGTranslate(this);" class="notranslate"><option value="">Select Language</option><option value="en|ar">Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©</option><option value="en|zh-TW">ç¹é«”ä¸­æ–‡</option><option value="en|en">English</option><option value="en|fr">FranÃ§ais</option><option value="en|de">Deutsch</option><option value="en|hi">à¤¹à¤¿à¤¨à¥à¤¦à¥€</option><option value="en|it">Italiano</option><option value="en|ja">æ—¥æœ¬èªž</option><option value="en|pt">PortuguÃªs</option><option value="en|ru">Ð ÑƒÑÑÐºÐ¸Ð¹</option><option value="en|es">EspaÃ±ol</option></select><style type="text/css">                       
                        .goog-text-highlight {
                            background-color: none !important;
                            -webkit-box-shadow: none !important;
                            -moz-box-shadow: none !important;
                            box-shadow: none !important;
                            box-sizing: none !important;
                            -webkit-box-sizing: none !important;
                            -moz-box-sizing: none !important;
                            position: none !important;
                        }
                        </style>
                        <div id="google_translate_element2"></div>
            <!--            <script type="text/javascript">
                        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: '',autoDisplay: true}, 'google_translate_element2');}
                        </script>
                        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
                        <script type="text/javascript">                     
                        function GTranslateGetCurrentLang() {var keyValue = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
                        function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt);alert(evt);alert(element);}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt);}}catch(e){}}
                        function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;if(typeof ga!='undefined'){ga('send', 'event', 'GTranslate', lang, location.hostname+location.pathname+location.search);}else{if(typeof _gaq!='undefined')_gaq.push(['_trackEvent', 'GTranslate', lang, location.hostname+location.pathname+location.search]);}var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(sel[i].className=='goog-te-combo')teCombo=sel[i];if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
                        </script>       
                        </li>-->
                                        <li><!-- GTranslate: https://gtranslate.io/ -->
<!-- GTranslate: https://gtranslate.io/ -->
 <select onchange="doGTranslate(this);doenglish(this.value);" class="notranslate"><option value="">Select Language</option><option value="en|ar">العربية</option><option value="en|zh-TW">繁體中文</option><option value="en|en">English</option><option value="en|fr">Français</option><option value="en|de">Deutsch</option><option value="en|hi">हिन्दी</option><option value="en|ta">தமிழ்</option><option value="en|it">Italiano</option><option value="en|ja">日本語</option><option value="en|pt">Português</option><option value="en|ru">Русский</option><option value="en|es">Español</option></select><style type="text/css">#goog-gt-tt{display:none!important}.goog-te-banner-frame{display:none!important}.goog-te-menu-value:hover{text-decoration:none!important}body{top:0!important}#google_translate_element2{display:none!important}.goog-text-highlight{background-color:none!important;-webkit-box-shadow:none!important;-moz-box-shadow:none!important;box-shadow:none!important;box-sizing:none!important;-webkit-box-sizing:none!important;-moz-box-sizing:none!important;position:none!important}</style>

<div id="google_translate_element2"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage"><select class="goog-te-combo" aria-label="Language Translate Widget"><option value="">Select Language</option><option value="en">English</option><option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="az">Azerbaijani</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="nl">Dutch</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="ko">Korean</option><option value="ku">Kurdish (Kurmanji)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="lt">Lithuanian</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="gd">Scots Gaelic</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="te">Telugu</option><option value="th">Thai</option><option value="tr">Turkish</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="uz">Uzbek</option><option value="vi">Vietnamese</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option></select></div>Powered by <span style="white-space:nowrap"><a class="goog-logo-link" href="https://translate.google.com" target="_blank"><img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" style="padding-right: 3px" alt="Google Translate" width="37px" height="14px">Translate</a></span></div></div>
<script type="text/javascript">function googleTranslateElementInit2(){new google.translate.TranslateElement({pageLanguage:'',autoDisplay:true},'google_translate_element2');}</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">function GTranslateGetCurrentLang(){var keyValue=document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue?keyValue[2].split('/')[2]:null;}
function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt);alert(evt);alert(element);}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt);}}catch(e){}}
function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang()==null&&lang==lang_pair.split('|')[0])return;if(typeof ga!='undefined'){ga('send','event','GTranslate',lang,location.hostname+location.pathname+location.search);}else{if(typeof _gaq!='undefined')_gaq.push(['_trackEvent','GTranslate',lang,location.hostname+location.pathname+location.search]);}var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(sel[i].className=='goog-te-combo')teCombo=sel[i];if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}</script>

                                        </li>
                        <li>
                            <div class="form-group">
                                <div id="countries" data-input-name="country" class="flagstrap">                         
                                </div>
                            </div>
                        </li>  
                        @if($is_login == 0)                     
                        <li>
                            <button type="button" class="btn btn-default" onClick="location.href ='{{url('/login')}}'">SIgn In</button>
                            <button type="button" class="btn btn-default" onClick="location.href ='{{url('/register')}}'">SIgn up</button>
                        </li>
                        @else
                            <a data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false" href="#" title="{{Session::get('firstname')}} {{Session::get('lastname')}}">

                            <div class="name">Welcome, {{Session::get('firstname')}} {{Session::get('lastname')}}  <span class="caret"></span></div></a>
                            <ul id="menu-user-menu" class="dropdown-menu"><li id="menu-item-82" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-42 current_page_item menu-item-82 active"><a title="E-First_AIM" href="{{url('/')}}">Dashboard</a></li>
                            <li id="menu-item-2893" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2893"><a title="Blog" href="{{url('/blog')}}">Blog</a></li>
                            <li id="menu-item-316" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-316"><a title="Messages" href="{{url('/messages')}}">Messages</a></li>
                            <li id="menu-item-250" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-250"><a title="Account" href="{{url('/account')}}">Account</a></li>
                            <li id="menu-item-4558" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4558"><a title="Market Place" href="{{url('/market-place')}}">Market Place</a></li>
                            <li id="menu-item-4468" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4468"><a title="Orders" href="{{url('/')}}/market-place/orders">Orders</a></li>
                            <li id="menu-item-81" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81"><a title="Logout" href="{{url('/logout')}}">Logout</a></li>
                            </ul>`
                        @endif
                        </ul>
                                </div>  
                                <div class="navbar-right new-nav">
                                    <nav class="navbar navbar-default">
                                        <ul class="nav navbar-nav dropup">    
                                            <li class="dropdown mega-dropdown"> 
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrepreneurs
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-1 mega-dropdown-menu dropup  row">
                                                    <li class="col-sm-4">
                                                        <ul>
                                                            <li><a href="{{url('/entrepreneur')}}/search/1">Diaspora</a></li>
                                                             <li><a href="{{url('/entrepreneur')}}/search/2">Social Entrepreneur</a></li>
                                                             <li><a href="{{url('/entrepreneur')}}/search/3">Uncategorized</a></li>
                                                             <li><a href="{{url('/entrepreneur')}}/search/4">Women</a></li>
                                                             <li><a href="{{url('/entrepreneur')}}/search/5">Youth</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="col-sm-8">
                                                        <ul>
                                                            <li class="descr">Create, analyze, and optimize your business plan</li>
                                                            <li class="descr">Maximize your entrepreneurship success with supporters</li>
                                                            <li class="descr">Secure flexible funding for your business from investors</li>
                                                            <li class="descr">
                                                               @if($is_login == 0)  <button type="button" class="btn" onclick="location.href ='{{url("/ent-register")}}'">SIGN UP NOW</button>@endif
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul> 
                                            </li>          
                                            <li class="dropdown mega-dropdown"> 
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Investors
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-2 mega-dropdown-menu dropup  row">
                                                    <li class="col-sm-7">
                                                        <ul>
                                                            <li class="descr">Create an investor profile with your criteria</li>
                                                            <li class="descr">Browse our entrepreneurs’ investment opportunities</li>
                                                            <li class="descr">Sort, analyze, and compare opportunities in minutes</li>
                                                            <li class="descr">
                                                                @if($is_login == 0)  <button type="button" class="btn" onclick="location.href ='{{url("/inv-register")}}'">SIGN UP NOW</button>@endif         
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="col-sm-5">
                                                        <ul>                                            
                                                            <li><a href="{{url('/category')}}">Angel investor</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Banks/MFI</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Peer to Peer Lender</a></li>
                                                            <li><a href="{{url('/category')}}">Personal Investor</a></li>
                                                            <li><a href="{{url('/category')}}">Venture Capitalist</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>        
                                            </li>
                                            <li class="dropdown mega-dropdown"> 
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Supporters 
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-3 mega-dropdown-menu dropup col-sm-8 pull-right">
                                                    <li class="col-sm-7">
                                                        <ul>
                                                            <li class="descr">Create a supporter profile with your focus areas</li>
                                                            <li class="descr">Understand entrepreneur’s needs and growth opportunities</li>
                                                            <li class="descr">Share your expertise and practical experience with entrepreneurs</li>
                                                            <li class="descr">
                                                              @if($is_login == 0)  <button type="button" class="btn" onclick="location.href ='{{url("/sup-register")}}'">SIGN UP NOW</button>@endif
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="col-sm-5">
                                                        <ul>                                            
                                                            <li><a href="{{url('/category')}}">Bank</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Government</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Media</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Mentor</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Non-profit</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Student</a></li>                                 
                                                            <li><a href="{{url('/category')}}">University</a></li>                                 
                                                            <li><a href="{{url('/category')}}">Company</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>        
                                            </li>
                                        </ul>
                                        <ul class="nav navbar-nav nav-big">
                                            <li class="search">
                                                <form method="get" id="searchform" action="#">
                                                    <input class="form-control btn-primary" value="" name="s" id="s" placeholder="Search for..." type="text">
                                                    <input name="post_type[]" value="investor" type="hidden">
                                                    <input name="post_type[]" value="project" type="hidden">
                                                    <input name="post_type[]" value="supporter" type="hidden">
                                                    <input name="post_type[]" value="organization" type="hidden">                      
                                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>
              <!-- Collect the nav links, forms, and other content for toggling --> 
              <!-- /.navbar-collapse --> 
            </nav>
        </header>
        <script type="text/javascript">
            function doenglish(lang){
                //alert(lang);
                
            }
        </script>