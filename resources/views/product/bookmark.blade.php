<span>
    @if ($product['is_bookmark'] == 0)
        <button id="bookmark" class="ri-bookmark-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
    @else
        <button  id="bookmark" class="ri-bookmark-fill fontSize30 b-0 colorYellow btnHover backColorWhite"></button>
    @endif
    <button data-remodal-target="share-modal" class="ri-stackshare-line fontSize30 b-0 colorWhiteGray btnHover backColorWhite"></button>
</span>

@if($is_login)
    <script>
        $('#bookmark').click(function(){
            if($(this).hasClass('ri-bookmark-line'))
                $(this).removeClass('ri-bookmark-line').addClass('ri-bookmark-fill colorYellow').addClass('.');
            else
                $(this).removeClass('ri-bookmark-fill').removeClass('colorYellow').addClass('ri-bookmark-line colorWhiteGray ');
        });
    </script>
@else
    <script>
        
        $('#bookmark').click(function(){
        });
    </script>
@endif