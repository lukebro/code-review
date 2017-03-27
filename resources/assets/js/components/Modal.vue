<template>
    <div class="modal" :class="{ 'is-active': active }">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div class="box">
                <h1 class="title"><slot name="title"></slot></h1>
                <div class="content">
                    <slot></slot>
                </div>
            </div>
        </div>
        <div class="modal-close" @click="active = false"></div>
    </div>
</template>

<script>
    export default {
        props: {
            name: {
                type: String,
                required: true,
            }
        },

        mounted() {
            Event.$on('modal', name => {
                if (name === this.name) {
                    this.active = true;
                }
            });
        },

        data() {
            return {
                active: false,
            }
        }
    }
</script>
