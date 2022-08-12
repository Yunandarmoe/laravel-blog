@component('mail::message')
# Your post was liked

{{ $liker->name }} Like one of your posts

@component('mail::button', ['url' => route('posts.show', $post)])
    View Post
@endcomponent

Thanks,
@endcomponent
