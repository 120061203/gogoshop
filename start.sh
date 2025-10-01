#!/bin/bash

echo "🚀 啟動GOGO茶飲專案..."

# 檢查Docker是否安裝
if ! command -v docker &> /dev/null; then
    echo "❌ Docker未安裝，請先安裝Docker"
    exit 1
fi

if ! command -v docker-compose &> /dev/null; then
    echo "❌ Docker Compose未安裝，請先安裝Docker Compose"
    exit 1
fi

# 停止現有容器
echo "🛑 停止現有容器..."
docker-compose down

# 構建並啟動容器
echo "🔨 構建並啟動容器..."
docker-compose up --build -d

# 等待資料庫啟動
echo "⏳ 等待資料庫啟動..."
sleep 10

# 檢查容器狀態
echo "📊 檢查容器狀態..."
docker-compose ps

echo ""
echo "✅ 專案啟動完成！"
echo ""
echo "🌐 網站訪問地址："
echo "   主網站: http://localhost:8080"
echo "   管理後台: http://localhost:8080/admin/shop.php"
echo "   phpMyAdmin: http://localhost:8081"
echo ""
echo "🔑 預設管理員帳號："
echo "   帳號: admin"
echo "   密碼: admin"
echo ""
echo "📱 測試帳號："
echo "   帳號: root"
echo "   密碼: 12345678"
echo ""
echo "🛠️  管理命令："
echo "   查看日誌: docker-compose logs -f"
echo "   停止服務: docker-compose down"
echo "   重啟服務: docker-compose restart"
