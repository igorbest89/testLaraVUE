<template>
    <div class="container">
        <div>
            <input type="text" v-model="task" placeholder="Enter a new task..." v-on:keyup.enter="addTask">
            <ul>
                <li  v-for="task in getTasks">{{task.task_text}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                task: '',
                tasks: [],
            }
        },
        props: ['ptasks'],
        computed: {
            getTasks() {
                return this.tasks;
            }
        },
        methods: {
            async addTask() {
                this.tasks.unshift({task_text: this.task});
                let ret = await axios.post('/addTask', {taskText: this.task});
            },
            updateTasks() {
                this.tasks = this.ptasks;
            }
        },
        mounted() {
            this.updateTasks();
        }
    }
</script>
<style>
    .container {
        width: 35%;
        background: #efefef;
        margin: 0 auto;
        margin-top: 11%;
        padding: 1.6rem;
    }
    .container input {
        width: 94%;
        border-radius: 4px;
        border: 1px solid #c3c3c3;
        padding: 0.6rem;
    }
    ul {
        padding: 0 1rem;
    }
    li {
        padding: 0.2rem;
    }
</style>
