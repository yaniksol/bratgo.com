

<html>

    <head>
        
        <title>jquery</title>
 
        <script type="text/javascript" src="jquery.min.js"></script>
        <script src="jquery-ui/jquery-ui.js"></script>
        <link href="jquery-ui/jquery-ui.css" rel="stylesheet">
        
        
        <style type="text/css">
            body {
                font-family: helvetica, sans-serif;
                padding: 0;
                margin: 0;
            }
            #header {
                background-color: #EDEDED;
                height: 35px;
                width: 100%;
                border-bottom:1px solid #BFBFBF; 
                
              
                }
            #logo {
                float:left;
                padding: 6px 10px;
                font-weight: bold;
                font-size: 120%;
                }
            #buttonContainer {
                width: 220px;
                height: 28px;
                margin: 0 auto;
                position:relative;
                top:2px;
                font-size: 85%;
                }
            .toggleButton {
                float:left;
                padding: 7 5;
                border: 1px solid #BFBFBF;
                border-right: none;
                }
            #output {
                border-right: 1px solid #BFBFBF;
                border-bottom-right-radius: 4px;
                border-top-right-radius: 4px;
                }
            #html {
                border-bottom-left-radius: 4px;
                border-top-left-radius: 4px;
                }
            .active {
                background-color: #E8F2FF;
                }
            .highlightedButton {
                background-color: #E4E4E4;
                }
            
            textarea {
                resize : none;
                border-top: none;
                }
            
            .panel {
                float: left;
                width: 50%;
                border-left: none;
                }
            
            iFrame {
                border: none;
                }
            .hidden {
                display: none;
                }
        </style>
        
    </head>



    <body>
        
        <div id="header">
            <div id="logo"> 
                CodePlayer
            </div>
        
            <div id="buttonContainer">
                <div class="toggleButton active" id="html"> HTML </div>
                <div class="toggleButton" id="css"> CSS </div>
                <div class="toggleButton" id="javascript"> JavaScript</div>
                <div class="toggleButton active" id="Output"> Output </div>
            
            </div>
        
        </div>
        
        <div id="bodyContainer"> 
            <textarea id="htmlPanel" class="panel"> <p id="paragraph" >Zdravo </p> </textarea>
             <textarea id="cssPanel" class="panel hidden">p {color:green;} </textarea>
             <textarea id="javascriptPanel" class="panel hidden">document.getElementById("paragraph").innerHTML = "Ahoj" </textarea>
            <iFrame id="outputPanel" class="panel"></iFrame>
        
        </div>
        
        <script type="text/javascript">
           function updateOutput() {
                
                $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
                
                document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
                    
            }
            
            $(".toggleButton").hover(function (){
               $(this).addClass("highlightedButton") 
            }, function (){
                $(this).removeClass("highlightedButton")
                });
            
            $(".toggleButton").click (function () {
                $(this).toggleClass("active");
                $(this).removeClass("highlightedButton");
                var panelId = $(this).attr("id") + "Panel" ;
                $("#" + panelId).toggleClass("hidden");
                var numberOfActivePanels = 4 - $('.hidden').length;
                $(".panel").width(($(window).width()/numberOfActivePanels)- 4);
                });
            
            $(".panel").height($(window).height() - $("#header").height() - 7);
            $(".panel").width(($(window).width()/2)- 4);
            
            updateOutput ();
             
            $("textarea").on('change keyup paste', function() {
    
                updateOutput();
                
                
            });
        </script>
        
    </body>

</html>