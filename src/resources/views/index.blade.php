<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <p>Contact</p>
            </div>
            <form class="form" action="/contacts/confirm" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">お名前</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content form__group-content--name">
                        <div class="form__input-name-wrapper">
                            <div class="form__input-name-item">
                                <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <p class="error_message">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form__input-name-item">
                                <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <p class="error_message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">性別</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-radio">
                            <label><input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>男性</label>
                            <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性</label>
                            <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>その他</label>
                        </div>
                        <div class="form__error">
                            @error('gender')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">メールアドレス</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-email">
                            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                        </div>
                        <div class="form__error">
                            @error('email')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">電話番号</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-tel">
                            <input type="tel" name="tel1" maxlength="4" placeholder="090" value="{{ old('tel1') }}">
                            <span>-</span>
                            <input type="tel" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}">
                            <span>-</span>
                            <input type="tel" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}">
                        </div>
                        <div class="form__error">
                            @error('tel')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">住所</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-address">
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        </div>
                        <div class="form__error">
                            @error('address')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">建物名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-address">
                            <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">お問い合わせの種類</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-select">
                            <select name="category_id">
                                <option value="" disabled selected>選択してください</option>
                                <option value="1">商品のお届けについて</option>
                                <option value="2">商品の交換について</option>
                                <option value="3">ショップへのお問い合わせ</option>
                                <option value="4">その他</option>
                            </select>
                        </div>
                        <div class="form__error">
                            @error('category_id')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__group-label-item">お問い合わせ内容</span>
                        <span class="form__label-required">※</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input-textarea">
                            <textarea name="detail" maxlength="120" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                        </div>
                        <div class="form__error">
                            @error('detail')
                                <p class="error_message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
