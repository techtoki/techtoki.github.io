import {Cards} from "../widgets/product_card/product_card.js";
$(document).ready(()=>{
    
    new Cards({container:document.getElementById("most-popular"),isHorizontal:false});
    
    new Cards({container:document.getElementById("discover"),isHorizontal:false});
    
});

