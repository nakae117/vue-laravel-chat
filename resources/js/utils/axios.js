import $axios from 'axios'

let token = document.head.querySelector('meta[name="csrf-token"]')

$axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

if (token) {
	$axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

export default $axios