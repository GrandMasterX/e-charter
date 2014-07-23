
<div id="overlay" style="display: <?if(isset($page) && !empty($page)){?>block<?}else{?>none<?}?>;"></div>
<header>
    <div class="wrap clearfix">
        <?php $this->renderPartial('/layouts/header');?>
    </div>
</header>
<div class="popular_container">
    <div class="wrap">
        <div id="loader" style="position:relative;z-index:1000;top:-1px;">
        </div>
        <div id="tripsResultContainer" style="display: none;"></div>
        <div class="block clearfix">
            <div class="row_block left maintext" style="background-color: #fff6c6;">
                <h3 style="text-align:left;">Введите емейл</h3>
                <div style="min-height:273px;">
                    <center>
                        <div class="row_block left" style="width: 400px;margin-left: 0px;text-align: left;">
                            <?php
                            /**
                             * @var HOAuthAction $this
                             * @var HUserInfoForm $form
                             */
                            echo $form->form;
                            ?>
                        </div>
                    </center>
                </div>


            </div>
        </div>
    </div>
</div>