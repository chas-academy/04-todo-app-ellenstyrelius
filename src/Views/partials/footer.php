<footer class="footer">
    <span class="todo-count"><?= count(array_filter($todos, function($todo) { return $todo['completed'] === "false"; })) ?> item<?php count($todos) !== 1 ? "s" : "" ?> left</span>
    <button class="clear-completed">Clear completed</button>
</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center">Made by 
            <a href="http://ellenstyrelius.chas.academy/">Ellen Styrélius</a>
        </p>
    </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>