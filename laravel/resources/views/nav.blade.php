<nav class="navbar navbar-expand navbar-dark blue-gradient">
  <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>Memo</a>
  <ul class="navbar-nav ml-auto">
    <!-- ユーザーがまだログインしていない時の処理 -->
    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a> {{--この行を変更--}}
    </li>
    @endguest
    <!-- ここまで -->
    <!-- ユーザーがまだログインしていない時の処理 -->
    @guest
    <li class="nav-item">
      <a class="nav-link" href="">ログイン</a>
    </li>
    @endguest
    <!-- ここまで -->
    <!-- ユーザーがログイン済みの場合の処理 -->
    @auth
    <li class="nav-item">
      <a class="nav-link" href=""><i class="fas fa-pen mr-1"></i>投稿する</a>
    </li>
    @endauth
    <!-- ここまで -->
    <!-- ユーザーがログイン済みの場合の処理 -->
    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
                onclick="location.href=''">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    <!-- Dropdown -->
    @endauth
    <!-- ここまで -->
  </ul>
</nav>
