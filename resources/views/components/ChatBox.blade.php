<template>
    <div>
        <ul class="list-group">
            <li v-for="message in messages" :key="message.id" class="list-group-item">
                <strong>{{ message.user.name }}:</strong> {{ message.message }}
            </li>
        </ul>

        <div class="form-group mt-3">
            <input type="text" class="form-control" v-model="newMessage" @keydown.enter="sendMessage" placeholder="Type your message here...">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                if (this.newMessage.length > 0) {
                    axios.post('/chat/send', {
                        message: this.newMessage
                    })
                    .then(response => {
                        console.log(response.data);

                        this.newMessage = '';
                    })
                    .catch(error => {
                        console.log(error);
                    });
                }
            }
        }
    }
</script>
