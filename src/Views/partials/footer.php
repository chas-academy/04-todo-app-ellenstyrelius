<footer class="footer">
    <span class="todo-count">
        <?php
        $todosLeft = count(array_filter(
            $todos, function ($todo) { 
                return $todo['completed'] === "false";
            }
        ));
        echo "$todosLeft item";
        
        if ($todosLeft !== 1) {
            echo "s";
        } 
        ?> 
        left
    </span>
    
    <form method="POST" action="/todos/clear-completed">
        <button class="clear-completed">Clear completed</button>
    </form>
</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center">Made by 
            <a href="http://ellenstyrelius.chas.academy/" target="_blank">Ellen Styrélius</a>
        </p>
    </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>