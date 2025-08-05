<!DOCTYPE html>
<html lang="id" class="notranslate" translate="no">

<head>
    @include('home-components.meta')
    @include('home-components.css')

</head>

<body>
    <main id="app">
        <div id="modalOverlay" class="modal-backdrop fade" style="display: none;"></div>
        <!-- Loader -->
        <div id="loader" class="loader-wrapper">
            <div class="loader">
                <img src="{{ url('assets/images/icon.png') }}" class="loader-img" alt="Loading...">
            </div>
        </div>
        {{-- <div id="loader" class="loader-wrapper"><span class="loader"><span class="loader-inner"></span></span></div> --}}
        <!-- music -->
        <audio id="music" loop="" autoplay="">
            <source src="{{ asset('storage/' . $music->path) }}" type="audio/mpeg">
        </audio>
        <!-- end music -->
        <div id="workspace-container" class="position-fixed h-100 w-100" style="overflow: hidden">
            <div id="panZoom" class="position-fixed h-100 w-100"
                style="top: 0; right:0; bottom:0; left:0; transform-origin: 50% 50%;">
                <div class="h-100 w-100 d-flex align-items-center justify-content-center">
                    <div class="canvas not-open  ">
                        <!-- invitation -->
                        <div id="satuMomen" data-guest="{{ $guest }}" data-group="VIP">
                            <div class="satumomen_track">
                                <ul class="satumomen_list">
                                    @include('home-components.partials.cover')
                                    @include('home-components.partials.quotes')
                                    @include('home-components.partials.heart')
                                    @include('home-components.partials.akad')
                                    @include('home-components.partials.resepsi')
                                    @include('home-components.partials.walimatulursy')
                                    @include('home-components.partials.gallery')
                                    @include('home-components.partials.love-story')
                                    @include('home-components.partials.rsvp')
                                    @include('home-components.partials.gift')
                                    {{-- @include('home-components.partials.filter-ig') --}}
                                    @include('home-components.partials.thanks')
                                </ul>
                            </div>
                        </div>
                        <div id="smMenu" class="satumomen_menu">
                            <ul class="satumomen_menu_list">
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.144 20.782v-3.067c0-.777.632-1.408 1.414-1.413h2.875c.786 0 1.423.633 1.423 1.413v3.058c0 .674.548 1.222 1.227 1.227h1.96a3.46 3.46 0 0 0 2.444-1 3.41 3.41 0 0 0 1.013-2.422V9.866c0-.735-.328-1.431-.895-1.902l-6.662-5.29a3.115 3.115 0 0 0-3.958.071L3.467 7.963A2.474 2.474 0 0 0 2.5 9.867v8.703C2.5 20.464 4.047 22 5.956 22h1.916c.327.002.641-.125.873-.354.232-.228.363-.54.363-.864h.036Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Opening</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity=".4"
                                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83v10.33C3 20.26 4.77 22 7.81 22h8.381C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.08 6.65v.01a.78.78 0 0 0 0 1.56h2.989c.431 0 .781-.35.781-.791a.781.781 0 0 0-.781-.779H8.08Zm7.84 6.09H8.08a.78.78 0 0 1 0-1.561h7.84a.781.781 0 0 1 0 1.561Zm0 4.57H8.08c-.3.04-.59-.11-.75-.36a.795.795 0 0 1 .75-1.21h7.84c.399.04.7.38.7.79 0 .399-.301.74-.7.78Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Quotes</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity=".4"
                                            d="M11.776 21.837a36.258 36.258 0 0 1-6.328-4.957 12.668 12.668 0 0 1-3.03-4.805C1.278 8.535 2.603 4.49 6.3 3.288A6.282 6.282 0 0 1 12.007 4.3a6.291 6.291 0 0 1 5.706-1.012c3.697 1.201 5.03 5.247 3.893 8.787a12.67 12.67 0 0 1-3.013 4.805 36.58 36.58 0 0 1-6.328 4.957l-.25.163-.24-.163Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="m12.01 22-.234-.163a36.316 36.316 0 0 1-6.337-4.957 12.667 12.667 0 0 1-3.048-4.805c-1.13-3.54.195-7.586 3.892-8.787a6.296 6.296 0 0 1 5.728 1.023V22ZM18.23 10a.719.719 0 0 1-.517-.278.818.818 0 0 1-.167-.592c.022-.702-.378-1.341-.994-1.59-.391-.107-.628-.53-.53-.948.093-.41.477-.666.864-.573a.384.384 0 0 1 .138.052c1.236.476 2.036 1.755 1.973 3.155a.808.808 0 0 1-.23.56.708.708 0 0 1-.537.213Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Mempelai</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 16.87V9.257h18v7.674C21 20.07 19.024 22 15.863 22H8.127C4.996 22 3 20.03 3 16.87Zm4.96-2.46a.822.822 0 0 1-.85-.799c0-.46.355-.84.81-.861.444 0 .81.351.82.8a.822.822 0 0 1-.78.86Zm4.06 0a.822.822 0 0 1-.85-.799c0-.46.356-.84.81-.861.445 0 .81.351.82.8a.822.822 0 0 1-.78.86Zm4.03 3.68a.847.847 0 0 1-.82-.85.831.831 0 0 1 .81-.849h.01c.465 0 .84.38.84.849 0 .47-.375.85-.84.85Zm-4.88-.85c.02.46.395.821.85.8a.821.821 0 0 0 .78-.859.817.817 0 0 0-.82-.801.855.855 0 0 0-.81.86Zm-4.07 0c.02.46.395.821.85.8a.821.821 0 0 0 .78-.859.817.817 0 0 0-.82-.801.855.855 0 0 0-.81.86Zm8.14-3.639c0-.46.356-.83.81-.84.445 0 .8.359.82.8a.82.82 0 0 1-.79.849.814.814 0 0 1-.84-.799v-.01Z"
                                            fill="currentColor"></path>
                                        <path opacity=".4"
                                            d="M3.003 9.257c.013-.587.063-1.752.156-2.127.474-2.11 2.084-3.45 4.386-3.64h8.911c2.282.2 3.912 1.55 4.386 3.64.092.365.142 1.539.155 2.127H3.003Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8.305 6.59c.435 0 .76-.329.76-.77V2.771A.748.748 0 0 0 8.306 2c-.435 0-.76.33-.76.771V5.82c0 .441.325.77.76.77ZM15.695 6.59c.425 0 .76-.329.76-.77V2.771a.754.754 0 0 0-.76-.771c-.435 0-.76.33-.76.771V5.82c0 .441.325.77.76.77Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Akad</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 16.87V9.257h18v7.674C21 20.07 19.024 22 15.863 22H8.127C4.996 22 3 20.03 3 16.87Zm4.96-2.46a.822.822 0 0 1-.85-.799c0-.46.355-.84.81-.861.444 0 .81.351.82.8a.822.822 0 0 1-.78.86Zm4.06 0a.822.822 0 0 1-.85-.799c0-.46.356-.84.81-.861.445 0 .81.351.82.8a.822.822 0 0 1-.78.86Zm4.03 3.68a.847.847 0 0 1-.82-.85.831.831 0 0 1 .81-.849h.01c.465 0 .84.38.84.849 0 .47-.375.85-.84.85Zm-4.88-.85c.02.46.395.821.85.8a.821.821 0 0 0 .78-.859.817.817 0 0 0-.82-.801.855.855 0 0 0-.81.86Zm-4.07 0c.02.46.395.821.85.8a.821.821 0 0 0 .78-.859.817.817 0 0 0-.82-.801.855.855 0 0 0-.81.86Zm8.14-3.639c0-.46.356-.83.81-.84.445 0 .8.359.82.8a.82.82 0 0 1-.79.849.814.814 0 0 1-.84-.799v-.01Z"
                                            fill="currentColor"></path>
                                        <path opacity=".4"
                                            d="M3.003 9.257c.013-.587.063-1.752.156-2.127.474-2.11 2.084-3.45 4.386-3.64h8.911c2.282.2 3.912 1.55 4.386 3.64.092.365.142 1.539.155 2.127H3.003Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8.305 6.59c.435 0 .76-.329.76-.77V2.771A.748.748 0 0 0 8.306 2c-.435 0-.76.33-.76.771V5.82c0 .441.325.77.76.77ZM15.695 6.59c.425 0 .76-.329.76-.77V2.771a.754.754 0 0 0-.76-.771c-.435 0-.76.33-.76.771V5.82c0 .441.325.77.76.77Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Resepsi</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 16.87V9.257h18v7.674C21 20.07 19.024 22 15.863 22H8.127C4.996 22 3 20.03 3 16.87Zm4.96-2.46a.822.822 0 0 1-.85-.799c0-.46.355-.84.81-.861.444 0 .81.351.82.8a.822.822 0 0 1-.78.86Zm4.06 0a.822.822 0 0 1-.85-.799c0-.46.356-.84.81-.861.445 0 .81.351.82.8a.822.822 0 0 1-.78.86Zm4.03 3.68a.847.847 0 0 1-.82-.85.831.831 0 0 1 .81-.849h.01c.465 0 .84.38.84.849 0 .47-.375.85-.84.85Zm-4.88-.85c.02.46.395.821.85.8a.821.821 0 0 0 .78-.859.817.817 0 0 0-.82-.801.855.855 0 0 0-.81.86Zm-4.07 0c.02.46.395.821.85.8a.821.821 0 0 0 .78-.859.817.817 0 0 0-.82-.801.855.855 0 0 0-.81.86Zm8.14-3.639c0-.46.356-.83.81-.84.445 0 .8.359.82.8a.82.82 0 0 1-.79.849.814.814 0 0 1-.84-.799v-.01Z"
                                            fill="currentColor"></path>
                                        <path opacity=".4"
                                            d="M3.003 9.257c.013-.587.063-1.752.156-2.127.474-2.11 2.084-3.45 4.386-3.64h8.911c2.282.2 3.912 1.55 4.386 3.64.092.365.142 1.539.155 2.127H3.003Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8.305 6.59c.435 0 .76-.329.76-.77V2.771A.748.748 0 0 0 8.306 2c-.435 0-.76.33-.76.771V5.82c0 .441.325.77.76.77ZM15.695 6.59c.425 0 .76-.329.76-.77V2.771a.754.754 0 0 0-.76-.771c-.435 0-.76.33-.76.771V5.82c0 .441.325.77.76.77Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Tasyakuran</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 14.702v1.384c0 .23-.01.461-.03.69-.28 3.16-2.475 5.224-5.641 5.224H7.67c-1.603 0-2.956-.52-3.928-1.464a4.593 4.593 0 0 1-.951-1.232c.33-.402.7-.842 1.062-1.283a98.56 98.56 0 0 0 1.573-1.925c.55-.682 2.004-2.476 4.018-1.634.41.17.771.41 1.102.621.812.542 1.152.702 1.723.391.632-.34 1.043-1.012 1.473-1.714.23-.372.461-.732.712-1.063 1.092-1.423 2.775-1.804 4.178-.962.702.42 1.303.952 1.864 1.493.12.12.24.231.35.341.15.15.652.652 1.153 1.133Z"
                                            fill="currentColor"></path>
                                        <path opacity=".4"
                                            d="M16.339 2H7.67C4.275 2 2 4.376 2 7.914v8.172c0 1.232.28 2.326.792 3.218.33-.402.701-.842 1.062-1.284a95.981 95.981 0 0 0 1.573-1.924c.551-.682 2.004-2.476 4.018-1.634.41.17.771.41 1.102.621.812.542 1.152.702 1.723.39.632-.34 1.043-1.011 1.473-1.714.23-.37.461-.73.712-1.062 1.092-1.423 2.775-1.804 4.178-.962.702.42 1.303.952 1.864 1.493.12.12.24.231.35.342.151.149.652.65 1.153 1.133V7.914C22 4.376 19.726 2 16.339 2Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M11.454 8.797a2.604 2.604 0 0 1-2.58 2.581c-1.408 0-2.58-1.173-2.58-2.581s1.172-2.582 2.58-2.582c1.407 0 2.58 1.174 2.58 2.582Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Gallery</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity=".4"
                                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83v10.33C3 20.26 4.77 22 7.81 22h8.381C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.08 6.65v.01a.78.78 0 0 0 0 1.56h2.989c.431 0 .781-.35.781-.791a.781.781 0 0 0-.781-.779H8.08Zm7.84 6.09H8.08a.78.78 0 0 1 0-1.561h7.84a.781.781 0 0 1 0 1.561Zm0 4.57H8.08c-.3.04-.59-.11-.75-.36a.795.795 0 0 1 .75-1.21h7.84c.399.04.7.38.7.79 0 .399-.301.74-.7.78Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Love Story</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <i class="icon ph-fill ph-chat-circle-text" style="color: currentcolor;"></i>
                                    <span>RSVP</span>
                                </li>
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity=".4"
                                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83v10.33C3 20.26 4.77 22 7.81 22h8.381C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.08 6.65v.01a.78.78 0 0 0 0 1.56h2.989c.431 0 .781-.35.781-.791a.781.781 0 0 0-.781-.779H8.08Zm7.84 6.09H8.08a.78.78 0 0 1 0-1.561h7.84a.781.781 0 0 1 0 1.561Zm0 4.57H8.08c-.3.04-.59-.11-.75-.36a.795.795 0 0 1 .75-1.21h7.84c.399.04.7.38.7.79 0 .399-.301.74-.7.78Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Gift</span>
                                </li>
                                {{-- <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity=".4"
                                            d="M21.33 7.443a1.383 1.383 0 0 0-1.372-.064l-1.482.748a1.618 1.618 0 0 0-.888 1.456v5.833c0 .622.34 1.179.888 1.457l1.48.747c.202.104.417.153.632.153.258 0 .514-.073.743-.216.419-.263.669-.718.669-1.218V8.662c0-.5-.25-.956-.67-1.22Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M11.905 20H6.113C3.691 20 2 18.33 2 15.94V9.06C2 6.67 3.691 5 6.113 5h5.792c2.422 0 4.113 1.669 4.113 4.06v6.88c0 2.39-1.69 4.06-4.113 4.06Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Filter</span>
                                </li> --}}
                                <li class="satumomen_menu_item">
                                    <svg width="24" height="24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity=".4"
                                            d="M16.34 2H7.67C4.28 2 2 4.38 2 7.92v8.17C2 19.62 4.28 22 7.67 22h8.67c3.39 0 5.66-2.38 5.66-5.91V7.92C22 4.38 19.73 2 16.34 2Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.813 15.248a.872.872 0 0 1-.619-.256l-2.373-2.373a.874.874 0 1 1 1.237-1.238l1.755 1.755 4.128-4.128a.874.874 0 1 1 1.237 1.238l-4.746 4.746a.872.872 0 0 1-.619.256Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>Thanks</span>
                                </li>
                            </ul>
                        </div>
                        <!-- end invitation -->
                        <div class="floating-action d-flex align-items-end flex-column">
                            <button id="btnMusic" onclick="playMusic()" class="btn btn-float ">
                                <svg class="play" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" viewbox="0 0 256 256">
                                    <path
                                        d="M184,152V104a8,8,0,0,1,16,0v48a8,8,0,0,1-16,0Zm40-72a8,8,0,0,0-8,8v80a8,8,0,0,0,16,0V88A8,8,0,0,0,224,80ZM53.92,34.62A8,8,0,1,0,42.08,45.38L73.55,80H32A16,16,0,0,0,16,96v64a16,16,0,0,0,16,16H77.25l69.84,54.31A8,8,0,0,0,160,224V175.09l42.08,46.29a8,8,0,1,0,11.84-10.76Zm92.16,77.59A8,8,0,0,0,160,106.83V32a8,8,0,0,0-12.91-6.31l-39.85,31a8,8,0,0,0-1,11.7Z">
                                    </path>
                                </svg>
                                <svg class="pause" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" viewbox="0 0 256 256">
                                    <path
                                        d="M160,32V224a8,8,0,0,1-12.91,6.31L77.25,176H32a16,16,0,0,1-16-16V96A16,16,0,0,1,32,80H77.25l69.84-54.31A8,8,0,0,1,160,32Zm32,64a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V104A8,8,0,0,0,192,96Zm32-16a8,8,0,0,0-8,8v80a8,8,0,0,0,16,0V88A8,8,0,0,0,224,80Z">
                                    </path>
                                </svg>
                            </button>
                            <button id="btnAutoplay" class="btn btn-float ">
                                <svg class="play" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" viewbox="0 0 256 256">
                                    <path
                                        d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm36.44,110.66-48,32A8.05,8.05,0,0,1,112,168a8,8,0,0,1-8-8V96a8,8,0,0,1,12.44-6.66l48,32a8,8,0,0,1,0,13.32Z">
                                    </path>
                                </svg>
                                <svg class="pause" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" viewbox="0 0 256 256">
                                    <path
                                        d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24ZM112,160a8,8,0,0,1-16,0V96a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V96a8,8,0,0,1,16,0Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- lightbox -->
        <div id="lightboxWrapper" class="lightbox-wrapper">
            <div class="lightbox-list"></div>
            <a href="#" id="lightboxCloseBtn" class="btn-lightbox">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewbox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 0 1 1.414 0L10 8.586l4.293-4.293a1 1 0 1 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 0-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <div class="lightbox-navigation">
                <a href="#" id="lightboxPrevBtn" class="lightbox-arrow" data-index="0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none"
                        viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7">
                        </path>
                    </svg>
                </a>
                <a href="#" id="lightboxNextBtn" class="lightbox-arrow" data-index="0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="none"
                        viewbox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <!-- end lightbox -->
    </main>

    <!-- start script -->
    @include('home-components.js')

</body>

</html>
