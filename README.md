# Web開発クソアプリプロジェクト (Web Kaihatsu Kuso App Project)

このリポジトリは、「アホ特定アプリ（IQ精密検査）」などのジョークアプリを含むLaravelプロジェクトです。
友人がローカル環境で再現手順できるように、セットアップ手順を以下に記載します。

## 必須環境

*   PHP 8.2以上
*   Composer
*   Node.js & npm
*   MySQL (または互換性のあるデータベース)

## セットアップ手順

### 1. リポジトリのクローン

```bash
git clone https://github.com/luqhardy/web-kaihatsu-kusoapuri.git
cd web-kaihatsu-kusoapuri
```

### 2. 依存関係のインストール

PHPライブラリ（Laravelなど）とJavaScriptライブラリをインストールします。

```bash
composer install
npm install
```

### 3. 環境設定ファイルの作成

`.env.example` をコピーして `.env` を作成します。

```bash
cp .env.example .env
```

`.env` ファイルを開き、データベース接続情報を自分の環境に合わせて修正してください。（以下は例です）

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_kaihatsu_kusoapuri
DB_USERNAME=root
DB_PASSWORD=
```

### 4. アプリケーションキーの生成

```bash
php artisan key:generate
```

### 5. データベースのセットアップ

データベースのテーブル作成と、クイズデータの投入（Seeding）行います。
**注意:** このコマンドを実行すると、データベースがリセットされます。

```bash
php artisan migrate:fresh --seed
```

### 6. フロントエンドのビルド

```bash
npm run build
```

開発中は `npm run dev` を実行しておくと、変更がリアルタイムで反映されます。

### 7. サーバーの起動

```bash
php artisan serve
```

ブラウザで `http://localhost:8000` にアクセスしてください。

## アプリの使い方

### アホ特定アプリ (IQ精密検査)

1.  トップページの「IQ精密検査」カードにある「測定開始」をクリックします。
2.  カメラの使用を許可してください（このジョークアプリの肝です）。
3.  前半・後半のクイズに答えます。
4.  最後に衝撃の結果が表示されます。

### ITパスポート試験 (疑似)

1.  トップページの「ITパスポート試験 (疑似)」をクリックします。
2.  CBT方式のようなUIで問題が表示されます。

## ライセンス

このプロジェクトはジョークであり、MITライセンスの下で公開されています。