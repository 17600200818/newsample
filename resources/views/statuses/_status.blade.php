<li id="status-{{ $status->id }}">
    <a href="{{ route('users.show', $user->id )}}">
        <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
    </a>
    <span class="user">
    <a href="{{ route('users.show', $user->id )}}">{{ $user->name }}</a>
  </span>
    <span class="timestamp">
    {{ $status->created_at->diffForHumans() }}
  </span>
    <span class="content">{{ $status->content }}</span>
</li>
<style>
    .
    .
    .
        /* statuses */

    .statuses {
        list-style: none;
        padding: 0;
        margin-top: 20px;
    li {
        padding: 10px 0;
        border-top: 1px solid #e8e8e8;
        position: relative;
    }
    .user {
        margin-top: 5em;
        padding-top: 0;
    }
    .content {
        display: block;
        margin-left: 60px;
        word-break: break-word;
    img {
        display: block;
        padding: 5px 0;
    }
    }
    .timestamp {
        color: $gray-light;
        display: block;
        margin-left: 60px;
    }
    .gravatar {
        margin-right: 10px;
        margin-top: 5px;
    }
    form {
    button.status-delete-btn {
        position: absolute;
        right: 0;
        top: 10px;
    }
    }
    }

    aside {
    textarea {
        height: 100px;
        margin-bottom: 5px;
    }
    }

    .status_form {
        margin-top: 20px;
    }
</style>