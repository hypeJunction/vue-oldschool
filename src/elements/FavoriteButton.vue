<template>
    <a class="star" @click.stop="toggleFavorite">
        <i
            class="star icon"
            :class="iconClass"
        ></i>
        {{ label }}
    </a>
</template>

<script>
	export default {
		data() {
			return {
				isActive: false,
			}
		},

		computed: {
			iconClass() {
				return this.isActive ? 'yellow' : '';
			},

			label() {
				return this.isActive ? 'Unfovorite' : 'Favorite';
			}
		},

		methods: {
			toggleFavorite() {
				this.isActive = !this.isActive;
			}
		}
	}
</script>
