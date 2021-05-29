
export class Cards{
    constructor({category="all",container,addClassAll=[],specifiedClass={},onClick=()=>{},isHorizontal = false,onClickAction=()=>{}}){
        this.category = category;
        this.container = container;
        this.addClassAll = addClassAll;
        this.specifiedClass = specifiedClass;
        this.cards;
        this.onClick = onClick;
        this.onClickAction = onClickAction;
        if(!isHorizontal){
            this.requestCard("/ecommerce/widgets/product_card/product_card.php");
        }

        else{ 
            this.requestCard("/ecommerce/widgets/product_card/product_card_horizontal.php");
        }
    }

    loading(){
    let html=                   '<div class="spinner-border text-light" role="status">'
        html+=                       '<span class="visually-hidden">Loading...</span>'
        html+=                   '</div>'
       return html;
    }
    requestCard(product_card_php){
        if(sessionStorage.getItem(this.container.id)==null){
            $(this.container).load(product_card_php,
            { 
                product_category: this.category,
                add_class_all:this.addClassAll,
                specified_class:this.specifiedClass
            },
            (response, status, xhr)=>{
                sessionStorage.setItem(this.container.id,response);
                this.container.innerHTML = response;
                this.cards = response;
                this.cardContent(this);
            });
            this.container.innerHTML = this.loading();
        }
        else{
            this.container.innerHTML = sessionStorage.getItem(this.container.id);
            this.cards = sessionStorage.getItem(this.container.id);
            this.cardContent(this);
        }
    }
    cardContent(card){
        $(".card-container").mousedown((button)=>{
            card.onClick(button.currentTarget.id);
        });
        
        $(".action-button").mousedown((value)=>{
            card.onClickAction(value.currentTarget.id);
        });
        
        $(".card").mouseenter((button)=>{
            console.log("DOWN!");
            $($(button.currentTarget).find("#action-buttons")).addClass("d-flex");
            $($(button.currentTarget).find("#action-buttons")).removeClass("d-none");
            
            $($(button.currentTarget).find("#hover-price-info")).addClass("d-flex");
            $($(button.currentTarget).find("#hover-price-info")).removeClass("d-none");
            $($(button.currentTarget).find("#price-info")).removeClass("d-flex");
            $($(button.currentTarget).find("#price-info")).addClass("d-none");

        }).mouseleave((button)=>{
            
            $($(button.currentTarget).find("#action-buttons")).addClass("d-none");
            $($(button.currentTarget).find("#action-buttons")).removeClass("d-flex");

            $($(button.currentTarget).find("#hover-price-info")).removeClass("d-flex");
            $($(button.currentTarget).find("#hover-price-info")).addClass("d-none");
            $($(button.currentTarget).find("#price-info")).removeClass("d-none");
            $($(button.currentTarget).find("#price-info")).addClass("d-flex");
            
        });
    }
}



