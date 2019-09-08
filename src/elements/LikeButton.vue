<template>
    <a
        class="like"
        @click.stop="toggleLike"
    >
        <i
            class="like icon"
            :class="iconClass"
        ></i>

        <span
            v-if="count"
            class="count"
        >{{ count }}
        </span>

        <span
            v-if="!count"
            class="label"
        >Like
        </span>
    </a>
</template>

<script>
	export default {
		model: {
		    prop: 'count',
            event: 'change',
        },

		props: {
			count: {
				type: Number,
				default: 0,
			},
		},

		data() {
			return {
				isActive: false,
			}
		},

		computed: {
			iconClass() {
				return this.isActive ? 'red' : '';
			},
		},

		methods: {
			toggleLike(ev) {
				if (this.isActive) {
					this.isActive = false;
					this.$emit('change', this.count - 1);
                } else {
					this.isActive = true;
					this.$emit('change', this.count + 1);
                }
			}
		}
	}
</script>