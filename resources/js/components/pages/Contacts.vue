<template>
    <main>
        <div class="container">
            <h1>Contatti</h1>
            <div class="form">
                <h3>Informazioni di Contatto</h3>
                <form @submit.prevent="sendForm">
                    <div class="fields">
                        <div class="fields__name">
                            <label for="name">Nome<span>*</span></label>
                            <input type="text" id="name" v-model="name" />
                            <p v-if="errors.name">{{ errors.name[0] }}</p>
                        </div>
                        <div class="fields__surname">
                            <label for="surname">Cognome<span>*</span></label>
                            <input type="text" id="surname" v-model="surname" />
                            <p v-if="errors.surname">{{ errors.surname[0] }}</p>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="fields__email">
                            <label for="email">Email<span>*</span></label>
                            <input type="email" id="email" v-model="email" />
                            <p v-if="errors.email">{{ errors.email[0] }}</p>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="fields__message">
                            <label for="message">Messaggio<span>*</span></label>
                            <textarea id="message" v-model="message" />
                            <p v-if="errors.message">{{ errors.message[0] }}</p>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="fields__check">
                            <input
                                type="checkbox"
                                id="privacy"
                                v-model="privacy"
                            />
                            <label for="privacy"
                                >Ho letto e accetto i termini e le condizioni
                                indicate sulla pagina Privacy Policy<span
                                    >*</span
                                ></label
                            >
                            <p v-if="errors.privacy">{{ errors.privacy[0] }}</p>
                        </div>
                    </div>
                    <button type="submit" :disabled="sending">Invia</button>
                    <span class="success" v-if="success"
                        >Invio riuscito con successo !</span
                    >
                </form>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: "Contacts",
    data() {
        return {
            url: "http://127.0.0.1:8000/api/contacts",
            name: "",
            surname: "",
            email: "",
            message: "",
            privacy: "",
            errors: {},
            noError: false,
            sending: false,
            success: false,
        };
    },
    methods: {
        sendForm() {
            this.sending = true;
            axios
                .post(this.url, {
                    name: this.name,
                    surname: this.surname,
                    email: this.email,
                    message: this.message,
                    privacy: this.privacy,
                })
                .then((response) => {
                    this.sending = false;
                    this.success = false;
                    if (!response.data.success) {
                        this.errors = response.data.errors;
                    } else {
                        this.errors = {};
                        this.success = true;
                        setTimeout(() => (this.success = false), 5000);
                        this.name = "";
                        this.surname = "";
                        this.email = "";
                        this.message = "";
                        this.privacy = "";
                    }
                });
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    height: calc(100vh - 140px);
    overflow: auto;
    padding-bottom: 100px;
    .container {
        width: 80%;
        height: 100%;
        margin: 0 auto;
        h1 {
            margin: 25px 0;
        }
        .form {
            padding-bottom: 25px;
            .fields {
                margin: 25px 0;
                display: flex;
                label {
                    display: block;
                    margin-bottom: 5px;
                }
                input {
                    width: 200px;
                    padding: 3px;
                    border-radius: 5px;
                    border-width: 1px;
                }
                span {
                    color: red;
                }
                p {
                    color: red;
                    font-size: 10px;
                }
                .fields__name,
                .fields__surname {
                    margin-right: 15px;
                }
                .fields__message {
                    textarea {
                        min-width: 350px;
                        max-width: 800px;
                        padding: 5px;
                        min-height: 150px;
                        border-radius: 5px;
                        border-width: 1px;
                    }
                }
                .fields__check {
                    label {
                        display: inline-block;
                        font-size: 12px;
                    }
                    input {
                        width: 15px;
                    }
                }
            }
            button {
                padding: 8px 20px;
                background-color: #81fbb8;
                cursor: pointer;
                border-width: 1px;
                border-radius: 5px;
            }
            .success {
                display: inline-block;
                font-weight: 700;
                padding: 8px;
                color: green;
                background: #81fbb8;
                border-radius: 15px;
                margin-left: 25px;
            }
        }
    }
}
</style>
