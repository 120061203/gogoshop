# 🚀 GOGO茶飲 - Railway部署指南

## 📋 部署前準備

### 1. 確保本地環境正常
```bash
# 測試本地Docker環境
docker-compose up -d
curl http://localhost:8080
docker-compose down
```

### 2. 推送到GitHub
```bash
# 添加所有文件
git add .

# 提交更改
git commit -m "Prepare for Railway deployment"

# 推送到GitHub (需要先設置remote)
git remote add origin https://github.com/YOUR_USERNAME/gogoshop.git
git push -u origin main
```

## 🚀 Railway部署步驟

### 步驟1：創建Railway帳號
1. 訪問 [railway.app](https://railway.app)
2. 點擊 "Login with GitHub"
3. 授權Railway訪問你的GitHub

### 步驟2：創建新專案
1. 點擊 "New Project"
2. 選擇 "Deploy from GitHub repo"
3. 選擇你的 `gogoshop` 倉庫
4. 點擊 "Deploy Now"

### 步驟3：添加MySQL資料庫
1. 在專案儀表板中點擊 "+ New"
2. 選擇 "Database" → "MySQL"
3. 等待MySQL服務啟動
4. 記錄資料庫連接資訊

### 步驟4：配置環境變數
在專案設置中添加以下環境變數：

```bash
# 資料庫連接 (Railway會自動提供)
DB_HOST=${{MySQL.MYSQL_HOST}}
DB_USER=${{MySQL.MYSQL_USER}}
DB_PASSWORD=${{MySQL.MYSQL_PASSWORD}}
DB_NAME=${{MySQL.MYSQL_DATABASE}}

# 應用設置
PORT=80
```

### 步驟5：導入資料庫
1. 在MySQL服務中點擊 "Query"
2. 複製 `gogodrinkshop.sql` 的內容
3. 執行SQL腳本創建表和數據

### 步驟6：部署應用
1. Railway會自動檢測Dockerfile
2. 開始構建Docker鏡像
3. 部署完成後會提供訪問URL

## 🔧 故障排除

### 常見問題

#### 1. 構建失敗
```bash
# 檢查Dockerfile語法
docker build -t test .
```

#### 2. 資料庫連接失敗
- 檢查環境變數是否正確設置
- 確認MySQL服務已啟動
- 檢查防火牆設置

#### 3. 應用無法啟動
- 檢查健康檢查路徑 `/health.php`
- 查看Railway日誌
- 確認端口配置

### 查看日誌
在Railway專案中：
1. 點擊 "Deployments"
2. 選擇最新的部署
3. 查看 "Logs" 標籤

## 📊 監控和管理

### 免費額度
- **計算時間**: $5/月額度
- **資料庫**: 1GB存儲
- **帶寬**: 100GB/月

### 升級方案
- **Hobby**: $5/月
- **Pro**: $20/月
- **Team**: $99/月

## 🌐 訪問你的應用

部署成功後，Railway會提供：
- **應用URL**: `https://your-app-name.railway.app`
- **管理面板**: Railway儀表板
- **資料庫管理**: MySQL查詢界面

## 🔄 更新部署

每次推送代碼到GitHub時，Railway會自動重新部署：

```bash
# 修改代碼後
git add .
git commit -m "Update feature"
git push origin main
# Railway會自動部署
```

## 📞 支援

- **Railway文檔**: [docs.railway.app](https://docs.railway.app)
- **社群支援**: Railway Discord
- **GitHub Issues**: 專案倉庫
