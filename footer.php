<footer class="footer">
    <p class="footer__copyright">&copy; <?php echo getdate()['year'] ?>г. Все права защищены.</p>
</footer>

<script type='text/javascript'>
    /* <![CDATA[ */
    var admin_ajax = {"ajaxurl":"<?php echo admin_url('admin-ajax.php') ?>"};
    /* ]]> */
</script>

<!-- Load Scripts Start -->
<script>var scr = {"scripts":[
        {"src" : "<?php echo get_template_directory_uri()?>/assets/js/libsIndex.min.js", "async" : false},
        {"src" : "<?php echo get_template_directory_uri()?>/assets/js/index.min.js", "async" : false}
    ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Load Scripts End -->

</body>
</html>