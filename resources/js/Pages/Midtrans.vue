<template>
    <h5>{{ paymenSnap(token) }}</h5>
</template>
<script>
export default {
    props: {
        token: Object,
    },
    methods: {
        paymenSnap(token) {
            snap.pay(token, {
                onSuccess: () => {
                    //
                },
            });
        },
    },
};
</script>
