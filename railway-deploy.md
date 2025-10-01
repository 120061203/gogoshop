# 使用Railway部署GOGO茶飲系統

## 🚀 部署步驟

### 1. 準備Railway帳號
- 訪問 [railway.app](https://railway.app)
- 使用GitHub帳號登入

### 2. 連接GitHub倉庫
- 將專案推送到GitHub
- 在Railway中選擇 "Deploy from GitHub repo"
- 選擇你的gogoshop倉庫

### 3. 配置環境變數
在Railway項目設置中添加：
```
DB_HOST=mysql.railway.internal
DB_USER=root
DB_PASSWORD=your_mysql_password
DB_NAME=gogodrinkshop
```

### 4. 添加MySQL服務
- 在Railway項目中添加MySQL服務
- 系統會自動配置連接

### 5. 部署
- Railway會自動檢測Dockerfile
- 自動構建和部署

## 📝 注意事項

1. **免費額度限制**：Railway免費版有使用限制
2. **資料庫備份**：定期備份重要數據
3. **域名**：Railway會提供免費子域名

## 🔧 本地測試
```bash
# 確保Docker容器正常運行
docker-compose up -d

# 測試所有功能
curl http://localhost:8080
```

## 📊 成本估算
- **Railway免費版**：$5/月額度
- **MySQL服務**：包含在免費額度內
- **總成本**：免費（小規模使用）
