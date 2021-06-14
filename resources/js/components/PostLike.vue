<template>
    <a class="btn btn-secondary btn-sm" 
        :class="{ 'btn-success': isLikedBy }"
        @click="clickLike"
    >
        いいね
        <span class="badge">
            {{ countLikes }}
        </span>
    </a>
</template>

<script>
export default {
    props: {
        initialIsLikedBy: {
            type: Boolean,
            default: false,
        },
        initialCountLikes: {
            type: Number,
            default: 0
        },
        authorized: {
            type: Boolean,
            default: false
        },
        endpoint: {
            type: String
        }
    },
    data() {
        return {
            isLikedBy: this.initialIsLikedBy,
            countLikes: this.initialCountLikes,
        }
    },
    methods: {
        clickLike() {
            if(!this.authorized) {
                alert('いいねはログイン中のみ使用できます')
                return
            }
            
            this.isLikedBy ? this.unlike() : this.like()
        },
        async like() {
            const response = await axios.put(this.endpoint)
            
            this.isLikedBy = true
            this.countLikes = response.data.countLikes
        },
        async unlike() {
            const response = await axios.delete(this.endpoint)
            
            this.isLikedBy = false
            this.countLikes = response.data.countLikes
        }
    }
}
</script>