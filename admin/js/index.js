import {Dashboard,Tab} from "../../widgets/dashboard/dashboard.js";
let dashboard = new Dashboard([
    new Tab({tittle:"Product",
        subtittle:"Manage Your Products",
        icon:"bi-bag-fill",
        phpTabBody:"./tabs/product/product.html"}),
    new Tab({tittle:"Stat",subtittle:"How you doin?",icon:"bi-bar-chart-line-fill"}),
],document.getElementById("dashboard_container"));





