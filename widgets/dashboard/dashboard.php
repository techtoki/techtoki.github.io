
<?php
    $tabs = "";
    if(isset($_POST['tabs'])){
        $tabs = $_POST['tabs'];
    }
?>
<link rel="stylesheet" href="/ecommerce/widgets/dashboard/dashboard.css">

<div class="d-flex flex-column align-items-center" >
    <div class="d-flex flex-row w-100 mt-4 content">
        <ul class="list-group  rounded ms-2">
            <div>
                <?php
                    
                    foreach($tabs as $tab){
                        $tittle = $tab['tittle'];
                        $subtittle = $tab['subtittle'];
                        $icon = $tab['icon'];
                        $id = $tab['id'];
                        $tabs_out = <<<EOT
                        <button class="list-group-item tab-button-group w-100" id="$id">
                            <div class="menu-tittle-btn d-none d-sm-block "><i class="bi $icon"></i> $tittle</div>
                            <div class="menu-tittle-btn d-block d-sm-none"> <i class="bi $icon"></i> </div>
                            <div class="menu-sub-tittle-btn d-none d-md-block">$subtittle</div>
                        </button>
                        EOT;
                        echo $tabs_out;
                    }
                    
                ?>
            </div>
        </ul>
        <div class="tab-content ms-2 p-3 w-80 d-flex flex-column " id="tab-content">
            <div class="tab-tittle" id="tab-tittle">
                <div id="tittle">
                    Click any Tab
                </div>
                <div id="sub-tittle">
                    If you dont mind.
                </div>
            </div>
            <hr>
            <div id="tab-body">
                
            </div>
    </div>
</div>