<html lang="en">
    <head>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Donkeyquiz - boilerplate</title>
    </head>
    <body class="font-poppins">
        <div class="container mx-auto h-screen">
            <div class="logo m-auto right-0 left-0 absolute flex flex-col items-center p-4 md:items-start md:pt-7 md:pl-20">
                <object id="logoimage" type="image/svg+xml" data="images/Logo.svg" width="96" height="112"></object>
                <p class="font-24 text-darkblue font-semibold">donkeyquiz</p>
            </div>
            <div class="pointer-events-none overflow-hidden flex justify-center fixed inset-0">
                <div class="w-full relative min-w-[820px] h-full">
                    <div class="z-50 block absolute left-0 bottom-[77px]">
                        <object class="blob" type="image/svg+xml" data="images/blob-l.svg" width="154" height="415"></object>
                    </div>
                    <div class="z-50 block absolute right-0 top-[86px]">
                        <object class="blob" type="image/svg+xml" data="images/blob-r.svg" width="154" height="415"></object>
                    </div>
                </div>
            </div>
            <div id="progress" class="hidden absolute bottom-8 w-full flex flex-col items-center">
                <div class="relative my-4 w-full max-w-lg flex flex-col justify-center align-center" >
                    <div id="progressbase" class="h-0.5 w-full"></div>
                    <div id="progressbar" class="absolute h-0.5 w-1/4 rounded-full border-4"></div>
                </div>
                <div>
                    <p id="progresstext" class="text-16 font-normal text-center"></p>
                </div>
            </div>
            <div id="start" class="text-darkblue h-screen flex flex-col justify-center items-center text-center">
                <h1 class="text-32 md:text-48 font-semibold">Svensk mästare i TP?</h1>
                <p class="max-w-lg text-20 font-normal mt-8 mb-10">Utmana vänner, kollegor och familj på frågesport. Svara på 35 samtida frågor i 7 olika kategorier.</p>
                <button id="btnnewgame"  class="text-16 text-lightblue font-semibold border-2 border-lightblue rounded-full px-8 py-3.5 hover:bg-lightblue hover:text-white">Klicka här för att starta</button>
            </div>
            <div id="question" class="hidden text-darkblue h-screen flex flex-col justify-center items-center text-center">
                <h1 id="questioncategory" class="text-14 font-semibold"></h1>
                <p id="questiontext" class=" max-w-2xl text-20 md:text-48 font-semibold mx-8 mt-10 mb-16 md:mb-10"></p>
                <button id="btnseeanswer" class="text-16 font-semibold bg-white text-lightblue border-2 border-lightblue rounded-full px-8 py-3.5 hover:bg-lightblue hover:text-white">Se svaret</button>
            </div>
            <div id="answer" class="hidden bg-lightblue text-white h-screen flex flex-col justify-center items-center">
                <h1 class="text-14 font-semibold">Rätt svar</h1>
                <p id="answertext" class="text-48 text-green font-semibold my-10"></p>
                <p class="text-14 font-semiboldi mb-10">Svarade du rätt?</p>
                <div class="flex flex-row justify-between gap-6">
                    <button id="btncorrect" class="text-16 font-semibold border-2 border-white rounded-full px-8 py-3.5 hover:bg-white hover:text-lightblue">Ja</button>
                    <button id="btnwrong" class="text-16 font-semibold border-2 border-white rounded-full px-8 py-3.5 hover:bg-white hover:text-lightblue">Nej</button>
                </div>
            </div>
            <div id="result" class="hidden text-darkblue h-screen flex flex-col bg-white  pt-[120px] pb-0 md:py-4 justify-center items-center">
                <h1 class="text-14 font-semibold">Ditt resultat</h1>
                <p id="totalscore" class="md:text-48 text-24 font-semibold my-1 md:mt-10 md:mb-16"></p>
                <div class="lg:w-1/2 md:w-3/4 flex flex-col md:flex-row justify-between items-center">
                    <div id="filmtv" class="resultrow">
                        <div id="0-0" class="w-full"><p class="text-14 font-semibold text-center">Film &amp; TV</div>
                        <div id="0-1" class="indicator"></div><div id="0-2" class="indicator"></div>
                        <div id="0-3" class="indicator"></div><div id="0-4" class="indicator"></div>
                        <div id="0-5" class="indicator"></div>
                    </div>
                    <div id="geografi" class="resultrow">
                        <div id="1-0" class="w-full"><p class="text-14 font-semibold text-center">Geografi</p></div>
                        <div id="1-1" class="indicator"></div><div id="1-2" class="indicator"></div>
                        <div id="1-3" class="indicator"></div><div id="1-4" class="indicator"></div>
                        <div id="1-5" class="indicator"></div>
                    </div>
                    <div id="historia" class="resultrow">
                        <div id="2-0" class="w-full"><p class="text-14 font-semibold text-center">Historia</p></div>
                        <div id="2-1" class="indicator"></div><div id="2-2" class="indicator"></div>
                        <div id="2-3" class="indicator"></div><div id="2-4" class="indicator"></div>
                        <div id="2-5" class="indicator"></div>
                    </div>
                    <div id="musik" class="resultrow">
                        <div id="3-0" class="w-full"><p class="text-14 font-semibold text-center">Musik</p></div>
                        <div id="3-1" class="indicator"></div><div id="3-2" class="indicator"></div>
                        <div id="3-3" class="indicator"></div><div id="3-4" class="indicator"></div>
                        <div id="3-5" class="indicator"></div>
                    </div>
                    <div id="ovrigt" class="resultrow">
                        <div id="4-0" class="w-full"><p class="text-14 font-semibold text-center">Övrigt</p></div>
                        <div id="4-1" class="indicator"></div><div id="4-2" class="indicator"></div>
                        <div id="4-3" class="indicator"></div><div id="4-4" class="indicator"></div>
                        <div id="4-5" class="indicator"></div>
                    </div>
                    <div id="vetenskap" class="resultrow">
                        <div id="5-0" class="w-full"><p class="text-14 font-semibold text-center">Vetenskap</p></div>
                        <div id="5-1" class="indicator"></div><div id="5-2" class="indicator"></div>
                        <div id="5-3" class="indicator"></div><div id="5-4" class="indicator"></div>
                        <div id="5-5" class="indicator"></div>
                    </div>
                    <div id="sport" class="resultrow">
                        <div id="6-0" class="w-full"><p class="text-14 font-semibold text-center">Sport</p></div>
                        <div id="6-1" class="indicator"></div><div id="6-2" class="indicator"></div>
                        <div id="6-3" class="indicator"></div><div id="6-4" class="indicator"></div>
                        <div id="6-5" class="indicator"></div>
                    </div>
                </div>
                <button id="btnrunback" class="text-16 font-semibold text-lightblue border-2 border-lightblue rounded-full px-8 py-3.5 hover:bg-lightblue hover:text-white mt-1 md:mt-16">En runda till</button>
            </div>
        </div>
        <script type="module" crossorigin src="http://localhost:3000/@@vite/client"></script>
        <script type="module" crossorigin src="http://localhost:3000/resources/js/app.js"></script>
    </body>
</html>
