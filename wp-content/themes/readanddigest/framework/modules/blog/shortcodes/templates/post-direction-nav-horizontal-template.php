<div class="eltdf-bnl-navigation-holder">
    <div class="eltdf-bnl-navigation">
        <a class="eltdf-bnl-nav-icon eltdf-bnl-nav-prev"><span></span></a>
        <div class="eltdf-bnl-slider-paging">
            <?php
            $counter = 1;
            while($counter <= $max_pages){ ?>
                <a class="eltdf-paging-button-holder" href="#"><span class="eltdf-paging-button"></span></a>
            <?php $counter++; } ?>
        </div>
        <a class="eltdf-bnl-nav-icon eltdf-bnl-nav-next"><span></span></a>
    </div>
</div>