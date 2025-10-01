# GOGO茶飲 - 線上飲料店系統

這是一個完整的線上飲料店電商系統，使用PHP + MySQL開發，支援Docker部署。

## 🚀 快速啟動

### 使用Docker（推薦）

1. **確保已安裝Docker和Docker Compose**

2. **啟動專案**
   ```bash
   chmod +x start.sh
   ./start.sh
   ```

3. **訪問網站**
   - 主網站: http://localhost:8080
   - 管理後台: http://localhost:8080/admin/shop.php
   - phpMyAdmin: http://localhost:8081

### 手動啟動

```bash
# 構建並啟動容器
docker-compose up --build -d

# 查看容器狀態
docker-compose ps

# 查看日誌
docker-compose logs -f
```

## 🔑 預設帳號

### 管理員帳號
- 帳號: `admin`
- 密碼: `admin`

### 測試用戶帳號
- 帳號: `root`
- 密碼: `12345678`

## 📱 功能特色

### 用戶端功能
- ✅ 用戶註冊/登入
- ✅ 飲料商品瀏覽
- ✅ 購物車功能
- ✅ 訂單管理
- ✅ 個人資料管理

### 管理員功能
- ✅ 商品管理（新增/編輯/刪除飲料和配料）
- ✅ 會員管理
- ✅ 訂單管理
- ✅ 歷史訂單查看

## 🛠️ 技術架構

- **後端**: PHP 7.4 + MySQL 5.7
- **前端**: HTML + CSS + JavaScript
- **容器**: Docker + Docker Compose
- **資料庫**: MySQL 5.7
- **管理工具**: phpMyAdmin

## 📊 資料庫結構

- `users` - 用戶資料
- `drinks` - 飲料商品（32種飲料）
- `toppings` - 配料選項（12種配料）
- `cart` - 購物車
- `orders` - 訂單
- `drink_order` - 訂單飲料明細
- `topping_order` - 訂單配料明細
- `shop_users` - 管理員帳號

## 🎯 使用說明

1. **用戶註冊**: 訪問首頁點擊「註冊」創建新帳號
2. **瀏覽商品**: 在首頁瀏覽各種飲料商品
3. **加入購物車**: 點擊飲料旁的「+」按鈕加入購物車
4. **下單**: 在購物車頁面確認商品後下單
5. **管理後台**: 使用管理員帳號登入後台管理系統

## 🛠️ 管理命令

```bash
# 停止服務
docker-compose down

# 重啟服務
docker-compose restart

# 查看日誌
docker-compose logs -f

# 進入容器
docker-compose exec web bash

# 清理所有容器和數據
docker-compose down -v
```

## 📝 注意事項

- 首次啟動會自動導入資料庫結構和測試數據
- 所有數據會持久化保存在Docker volume中
- 如需修改資料庫配置，請編輯 `docker-compose.yml` 文件
- 如需修改PHP配置，請編輯 `Dockerfile` 文件

## 🐛 故障排除

如果遇到問題，請檢查：

1. Docker和Docker Compose是否正確安裝
2. 端口8080和8081是否被占用
3. 查看容器日誌：`docker-compose logs`
4. 確認資料庫是否正常啟動

## 📞 客服資訊

- 客服專線: 0800-000-482
- 服務時間: 週一至週六 09:00-18:00
- 週日與國定假日除外
