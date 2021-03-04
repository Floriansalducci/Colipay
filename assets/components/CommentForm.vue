<template>
</template>
<div class="card">
    <h3 class="card-header text-center">Nouveau commentaire</h3>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nom</label>
                    <input type="text" class="form-control"
                    v-model.trim="$v.Firstname.$model" :class="{
                        'is-invalid':$v.Firstname.$error,'is-valid':!$v.Firstname.$invalid }">
                    <div class="valid-feedback">Ton nom est validé</div>
                </div>

            </div>
        </form>
    </div>

</div>
<script>
import {required, minLength, maxLength,email, between} from 'validate/lib/validators'

export default {
    name : 'FormValidation',
    data(){
        return{
            Firstname:'',
            LastName:'',
            Dateofbirth:'',
            email:'',
            content:''
        }
    },
    validation:{
        Firstname:{
            required,
            minLength: minLength(3),
            maxLength: maxLength(15)

        },
        Lastname:{
            required,
            minLength: minLength(3),
            maxLength: maxLength(15)

        },
        email:{
            required,
            email

        },
        props: {
            showDay: {
                type: Boolean,
                default: true,
            },
            showMonth: {
                type: Boolean,
                default: true,
            },
            showYear: {
                type: Boolean,
                default: true,
            },

        }
    }
}
</script>

<style scoped>
    </style>