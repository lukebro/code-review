<template>
    <div>
        <div class="columns is-multiline" v-for="(checkpoint, index) in checkpoints">
            <div class="column is-1 has-padding">
                <label class="label">
                    <div class="title is-2">{{ index + 1 }}</div>
                </label>
            </div>
            <div class="column is-4">
                <div class="field">
                    <label class="label">Name</label>
                    <p class="control">
                        <input type="text" class="input" :name="'checkpoint['+index+'][name]'" v-model="checkpoint.name" autocomplete="off" placeholder="Checkpoint name" required>
                    </p>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Due Date</label>
                    <p class="control">
                        <input type="datetime-local" class="input" :name="'checkpoint['+index+'][due_at]'" :min="minimumDate" v-model="checkpoint.due_at" required>
                    </p>
                </div>
            </div>
            <div class="column is-1">
                <div class="field">
                    <label class="label">&nbsp;</label>
                    <span class="tag is-danger" style="padding: 0.4em;" v-if="checkpoints.length > 1">
                        <button type="button" class="delete is-small" style="margin: 0;" @click="removeCheckpoint(index)"></button>
                    </span>
                </div>
            </div>
            <div class="column is-1"></div>
            <div class="column is-7">
                <div class="field">
                    <label class="label">Description</label>
                    <input class="input" :name="'checkpoint['+index+'][description]'" placeholder="Description of the checkpoint (optional)" autocomplete="off">
                </div>
            </div>
            <div class="column is-3">
                <div class="field">
                    <label class="label">Total Points</label>
                    <input class="input" :name="'checkpoint['+index+'][points]'" placeholder="Points" autocomplete="off" required>
                </div>
            </div>
        </div>
        <button type="button" class="button is-default is-pulled-right" @click="addEmptyCheckpoint">Add checkpoint</button>
        <div class="is-clearfix"></div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        data() {
            return {
                checkpoints: [],
            }
        },

        mounted() {
            this.addEmptyCheckpoint();
        },

        methods: {
            addEmptyCheckpoint() {
                this.checkpoints.push({
                    name: '',
                    due_at: this.endOfDay,
                    description: '',
                    points: '',
                });
            },

            removeCheckpoint(index) {
                this.checkpoints.splice(index, 1);
            }
        },

        computed: {
            minimumDate() {
                return moment().format('YYYY-MM-DDTHH:mm');
            },
            endOfDay() {
                return moment().endOf('day').format('YYYY-MM-DDTHH:mm');
            }
        }
    }
</script>
