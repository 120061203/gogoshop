# 將GOGO茶飲改造為Vercel兼容版本

## 🎯 改造方案

### 技術棧變更
- **前端**: Next.js 14 + TypeScript + Tailwind CSS
- **後端**: Next.js API Routes
- **資料庫**: PlanetScale (MySQL) 或 Supabase (PostgreSQL)
- **部署**: Vercel

### 改造步驟

#### 1. 創建Next.js專案
```bash
npx create-next-app@latest gogoshop-nextjs --typescript --tailwind --app
cd gogoshop-nextjs
```

#### 2. 資料庫遷移
- 使用PlanetScale或Supabase
- 保持現有資料庫結構
- 使用Prisma ORM

#### 3. 功能對應
| 原PHP功能 | Next.js實現 |
|-----------|-------------|
| `index.php` | `app/page.tsx` |
| `user/login.php` | `app/login/page.tsx` |
| `admin/shop.php` | `app/admin/page.tsx` |
| `connect.php` | `lib/database.ts` |
| Session管理 | Next.js Cookies |

#### 4. API路由
```
app/api/
├── auth/
│   ├── login/route.ts
│   └── logout/route.ts
├── products/
│   ├── route.ts
│   └── [id]/route.ts
├── cart/
│   ├── route.ts
│   └── [id]/route.ts
└── orders/
    ├── route.ts
    └── [id]/route.ts
```

## 💰 成本估算
- **Vercel**: 免費（個人使用）
- **PlanetScale**: 免費（1GB）
- **總成本**: 免費

## ⏱️ 開發時間
- **前端改造**: 2-3週
- **後端API**: 1-2週
- **資料庫遷移**: 1週
- **測試部署**: 1週

## 🚀 部署流程
1. 推送到GitHub
2. 連接Vercel
3. 配置環境變數
4. 自動部署
