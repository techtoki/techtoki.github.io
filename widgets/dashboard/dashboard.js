

export class Dashboard{
    constructor(tabs,container) {
        this.tabs = tabs;
        this.container = container;
        if(tabs instanceof Array){
            let json_tab = [];
            tabs.forEach((tab)=>{
                if(!tab instanceof Tab){console.log("Needs to be an array instance of Tab and tittle must be unique"); return;}
                json_tab.push({tittle:tab.tittle,subtittle:tab.subtittle,icon:tab.icon,id:tab.id})
            });

            $(container).load("/ecommerce/widgets/dashboard/dashboard.php",{ tabs: json_tab},(response, status, xhr)=>{
                container.innerHTML = response;
                tabs.forEach((tab)=>{
                    $("#"+tab.id).click(()=>{
                        let tabContentBody = document.getElementById("tab-body");
                        let tabContentTittle = document.getElementById("tab-tittle");
                        tabContentTittle.childNodes[1].innerHTML = tab.tittle;//addning tittle
                        tabContentTittle.childNodes[3].innerHTML = tab.subtittle;//adding subtittle
                        if(tab.phpTabBody!=""){
                            $(tabContentBody).load(tab.phpTabBody);
                        }
                        
                    });
                });
                
                
            });


            return;
        }
        console.log("Needs to be an array instance of Tab"); return;
    }
    
}

export class Tab{
    constructor({tittle,subtittle,icon="",phpTabBody=""}){
        this.tittle = tittle;
        this.subtittle = subtittle;
        this.icon = icon
        this.id="";
        this.phpTabBody=phpTabBody;
        let words = tittle.toLowerCase().split(" ");
        words.forEach((word)=>{
            this.id+=word;
        });
    }
}
function hasDuplicates(arr) {
    return new Set(arr).size !== arr.length;
}