#!/bin/bash

echo "🚀 GOGO茶飲 - Railway部署助手"
echo "================================"

# 檢查Git狀態
if [ -n "$(git status --porcelain)" ]; then
    echo "⚠️  發現未提交的更改，請先提交："
    git status --short
    echo ""
    read -p "是否現在提交所有更改？(y/n): " -n 1 -r
    echo
    if [[ $REPLY =~ ^[Yy]$ ]]; then
        git add .
        git commit -m "Auto-commit before Railway deployment"
    else
        echo "❌ 請先提交更改後再運行此腳本"
        exit 1
    fi
fi

# 檢查是否已設置GitHub remote
if ! git remote get-url origin >/dev/null 2>&1; then
    echo "📝 請先設置GitHub倉庫："
    echo "1. 在GitHub創建新倉庫 'gogoshop'"
    echo "2. 運行以下命令："
    echo "   git remote add origin https://github.com/YOUR_USERNAME/gogoshop.git"
    echo "   git push -u origin main"
    echo ""
    read -p "是否已設置GitHub倉庫？(y/n): " -n 1 -r
    echo
    if [[ ! $REPLY =~ ^[Yy]$ ]]; then
        echo "❌ 請先設置GitHub倉庫"
        exit 1
    fi
fi

# 推送到GitHub
echo "📤 推送到GitHub..."
git push origin main

echo ""
echo "✅ 代碼已推送到GitHub！"
echo ""
echo "🚀 現在請按照以下步驟部署到Railway："
echo ""
echo "1. 訪問 https://railway.app"
echo "2. 使用GitHub帳號登入"
echo "3. 點擊 'New Project'"
echo "4. 選擇 'Deploy from GitHub repo'"
echo "5. 選擇 'gogoshop' 倉庫"
echo "6. 點擊 'Deploy Now'"
echo ""
echo "📋 部署完成後記得："
echo "- 添加MySQL資料庫服務"
echo "- 配置環境變數"
echo "- 導入資料庫數據"
echo ""
echo "📖 詳細說明請查看: RAILWAY_DEPLOY.md"
