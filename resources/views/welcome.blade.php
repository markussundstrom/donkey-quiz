<!DOCTYPE html>
<html lang="en">
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Donkeyquiz - boilerplate</title>
    </head>
    <body class="font-poppins bg-white transition-color duration-500">
        <div id="cont" class="-z-50 container mx-auto h-screen">
            <div class="logo m-auto right-0 left-0 absolute flex flex-col items-center p-4 md:items-start md:pt-7 md:pl-20">
                <object id="logoimage" type="image/svg+xml" data="images/Logo.svg" width="96" height="112"></object>
                <p id="logotext" class="md:block font-24 text-darkblue font-semibold transition-color duration-500">donkeyquiz</p>
            </div>
            <div class="z-10 hidden pointer-events-none overflow-hidden blob:flex justify-center fixed inset-0">
                <div class="w-full relative min-w-[1200px] h-full">
                    <div class="block absolute left-0 bottom-[77px]">
                        <svg id="blob-l" viewBox="0 0 400 400" class="blob nb:w-[250px] w-[400px] 2xl:w-[500px] nb:h-[250px]  h-[400px] 2xl:h-[500px]"> 
                            <path class="blobpath" d="" fill="#7678ED"></path>
                        </svg>
                        <!--<object class="blob" type="image/svg+xml" data="images/blob-l.svg" width="154" height="415"></object>-->
                    </div>
                    <div class="block absolute right-0 top-[86px]">
                        <svg id="blob-r" viewBox="0 0 400 400" class="blob nb:w-[250px] w-[400px] 2xl:w-[500px] nb:h-[250px]  h-[400px] 2xl:h-[500px]">
                            <path class="blobpath" d="" fill="#7678ED"></path>
                        </svg>
                        <!--<object class="blob" type="image/svg+xml" data="images/blob-r.svg" width="154" height="415"></object>-->
                    </div>
                </div>
            </div>
            <div id="progress" class="hidden absolute bottom-8 w-full flex flex-col items-center">
                <div class="relative my-4 w-full max-w-lg flex flex-col justify-center align-center" >
                    <div id="progressbase" class="h-0.5 w-full transition-color duration-500"></div>
                    <div id="progressbar" class="absolute h-0.5 w-0 bg-darkblue rounded-full border-4 border-darkblue transition-[width] transition-color duration-500"></div>
                </div>
                <div>
                    <p id="progresstext" class="text-16 font-normal text-center transition-color duration-1000"></p>
                </div>
            </div>
            <div id="start" class="text-darkblue h-screen flex flex-col justify-center items-center text-center transition-opacity duration-500">
                <h1 class="z-50 text-32 md:text-48 font-semibold">Svensk m??stare i TP?</h1>
                <p class="z-50 max-w-lg text-20 font-normal mt-8 mb-10">Utmana v??nner, kollegor och familj p?? fr??gesport. Svara p?? 35 samtida fr??gor i 7 olika kategorier.</p>
                <button id="btnnewgame"  class="z-51 text-16 text-lightblue font-semibold border-2 border-lightblue rounded-full px-8 py-3.5 hover:bg-lightblue hover:text-white">Klicka h??r f??r att starta</button>
            </div>
            <div id="question" class="bg-transparent hidden text-darkblue h-screen flex flex-col justify-center items-center text-center transition-opacity duration-500">
                <h1 id="questioncategory" class="z-50 text-14 font-semibold"></h1>
                <p id="questiontext" class="z-50 max-w-2xl text-20 nb:text-24 md:text-48 font-semibold mx-8 mt-10 mb-16 md:mb-10"></p>
                <button id="btnseeanswer" class="z-50 text-16 font-semibold bg-white text-lightblue border-2 border-lightblue rounded-full px-8 py-3.5 hover:bg-lightblue hover:text-white">Se svaret</button>
            </div>
            <div id="answer" class="hidden text-white h-screen flex flex-col justify-center items-center text-center transition-opacity duration-500">
                <h1 class="z-50 text-14 font-semibold">R??tt svar</h1>
                <p id="answertext" class="z-50 text-20 nb:text-24 md:text-48 text-green font-semibold my-10 mx-8 max-w-2xl"></p>
                <p class="z-50 text-14 font-semiboldi mb-10">Svarade du r??tt?</p>
                <div class="flex flex-row justify-between gap-6">
                    <button id="btncorrect" class="z-50 text-16 font-semibold border-2 border-white rounded-full px-8 py-3.5 hover:bg-white hover:text-lightblue">Ja</button>
                    <button id="btnwrong" class="z-50 text-16 font-semibold border-2 border-white rounded-full px-8 py-3.5 hover:bg-white hover:text-lightblue">Nej</button>
                </div>
            </div>
            <div id="result" class="bg-transparent hidden text-darkblue h-screen flex flex-col pt-[120px] pb-0 md:py-4 justify-center items-center transition-opacity duration-500">
                <h1 class="z-50 text-14 font-semibold">Ditt resultat</h1>
                <p id="totalscore" class="z-50 md:text-48 text-24 font-semibold my-1 md:mt-10 md:mb-16"></p>
                <div class="z-50 lg:w-1/2 md:w-3/4 flex flex-col md:flex-row justify-between items-center">
                    <div id="filmtv" class="resultrow">
                        <div id="0-0" class="w-full"><p class="text-14 font-semibold text-center">Film &amp; TV</div>
                        <div id="0-1" class="indicator bg-lightgray"></div><div id="0-2" class="indicator bg-lightgray"></div>
                        <div id="0-3" class="indicator bg-lightgray"></div><div id="0-4" class="indicator bg-lightgray"></div>
                        <div id="0-5" class="indicator bg-lightgray"></div>
                    </div>
                    <div id="geografi" class="resultrow">
                        <div id="1-0" class="w-full"><p class="text-14 font-semibold text-center">Geografi</p></div>
                        <div id="1-1" class="indicator bg-lightgray"></div><div id="1-2" class="indicator bg-lightgray"></div>
                        <div id="1-3" class="indicator bg-lightgray"></div><div id="1-4" class="indicator bg-lightgray"></div>
                        <div id="1-5" class="indicator bg-lightgray"></div>
                    </div>
                    <div id="historia" class="resultrow">
                        <div id="2-0" class="w-full"><p class="text-14 font-semibold text-center">Historia</p></div>
                        <div id="2-1" class="indicator bg-lightgray"></div><div id="2-2" class="indicator bg-lightgray"></div>
                        <div id="2-3" class="indicator bg-lightgray"></div><div id="2-4" class="indicator bg-lightgray"></div>
                        <div id="2-5" class="indicator bg-lightgray"></div>
                    </div>
                    <div id="musik" class="resultrow">
                        <div id="3-0" class="w-full"><p class="text-14 font-semibold text-center">Musik</p></div>
                        <div id="3-1" class="indicator bg-lightgray"></div><div id="3-2" class="indicator bg-lightgray"></div>
                        <div id="3-3" class="indicator bg-lightgray"></div><div id="3-4" class="indicator bg-lightgray"></div>
                        <div id="3-5" class="indicator bg-lightgray"></div>
                    </div>
                    <div id="ovrigt" class="resultrow">
                        <div id="4-0" class="w-full"><p class="text-14 font-semibold text-center">??vrigt</p></div>
                        <div id="4-1" class="indicator bg-lightgray"></div><div id="4-2" class="indicator bg-lightgray"></div>
                        <div id="4-3" class="indicator bg-lightgray"></div><div id="4-4" class="indicator bg-lightgray"></div>
                        <div id="4-5" class="indicator bg-lightgray"></div>
                    </div>
                    <div id="vetenskap" class="resultrow">
                        <div id="5-0" class="w-full"><p class="text-14 font-semibold text-center">Vetenskap</p></div>
                        <div id="5-1" class="indicator bg-lightgray"></div><div id="5-2" class="indicator bg-lightgray"></div>
                        <div id="5-3" class="indicator bg-lightgray"></div><div id="5-4" class="indicator bg-lightgray"></div>
                        <div id="5-5" class="indicator bg-lightgray"></div>
                    </div>
                    <div id="sport" class="resultrow">
                        <div id="6-0" class="w-full"><p class="text-14 font-semibold text-center">Sport</p></div>
                        <div id="6-1" class="indicator bg-lightgray"></div><div id="6-2" class="indicator bg-lightgray"></div>
                        <div id="6-3" class="indicator bg-lightgray"></div><div id="6-4" class="indicator bg-lightgray"></div>
                        <div id="6-5" class="indicator bg-lightgray"></div>
                    </div>
                </div>
                <button id="btnrunback" class="z-50 text-16 font-semibold text-lightblue border-2 border-lightblue rounded-full px-8 py-3.5 hover:bg-lightblue hover:text-white mt-1 md:mt-16">En runda till</button>
            </div>
        </div>
        <script type="module" crossorigin src="http://localhost:3000/@@vite/client"></script>
        <script type="module" crossorigin src="http://localhost:3000/resources/js/app.js"></script>
    </body>
</html>
