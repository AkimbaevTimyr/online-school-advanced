<?php if (strpos($this->context->route, '/') === 0 ||
    strpos($this->context->route, 'courses/') === 0 ||
    strpos($this->context->route, 'course/') === 0
) :
    ?>
    <footer id="footer" class="mt-auto">
        <?php echo $this->render('/widgets/footer') ?>
    </footer>
<?php endif; ?>