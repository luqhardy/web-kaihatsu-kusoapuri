<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show()
    {
        // 画像の内容に合わせたダミーデータ
        $question = [
            'id' => 1,
            'category' => 'ストラテジ系',
            'text' => 'ITサービスマネジメントのプロセスには、インシデント管理、問題管理、リリース管理などの活動がある。問題管理の活動はどれか。',
            'options' => [
                'ア' => '電子メールが送信できないと各部署から連絡があった。サービスを再開するためバックアップシステムを立ち上げた。',
                'イ' => '電子メールが送信できないと問合せがあった。利用者にPCの設定を確認してもらったところ、電子メールアドレスが誤っていたので修正してもらった。',
                'ウ' => 'メールシステムがサーバのハードウェア障害でダウンした。故障したハードウェア部品の交換と確認テストを実施した。',
                'エ' => 'メールシステムがダウンした。原因を究明するために情報システム部門の担当者とシステムを構築したベンダの技術者を招集し、情報収集を開始した。',
            ]
        ];

        // 受験者情報など
        $examinee = [
            'id' => 'IP1009A001',
            'name' => '試験 太郎',
            'remaining_time' => '163分 2秒',
        ];

        return view('exam.show', compact('question', 'examinee'));
    }
}