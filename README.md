# MATMAZEL İzmit — Web Sitesi (PHP)

https://matmazelizmit.com — İzmit kadın kuaförü, saç & makyaj stüdyosu.

Site, sunucuda HTML üreten sade PHP ile yazılmıştır (veritabanı yok). Tasarım Tailwind CSS ile derlenmiş tek bir CSS dosyası kullanır. Çalışırken Node.js gerekmez; Node yalnızca CSS'i yeniden derlemek için kullanılır.

## Klasör yapısı

```
index.php, hakkimizda.php, hizmetler.php, galeri.php, iletisim.php   Sayfalar
404.php                 Bulunamadı sayfası (gerçek 404 durum kodu)
sitemap.php             /sitemap.xml olarak sunulur (görsel site haritası dahil)
includes/config.php     İletişim bilgileri, hizmetler, galeri, yorumlar  ← içerik buradan değişir
includes/functions.php  Yardımcılar (görsel, ikon, Schema.org JSON-LD)
includes/header.php     <head>, SEO etiketleri ve menü
includes/footer.php     Alt bilgi
includes/popup.php      "Yeni salonumuza taşındık" popup'ı
assets/css/style.css    Derlenmiş CSS (elle düzenlemeyin)
assets/js/main.js       Menü, animasyonlar, popup, galeri lightbox
assets/img/             Optimize edilmiş WebP görseller
resources/              Kaynak dosyalar: tailwind.css, orijinal fotoğraflar, görsel betikleri
.htaccess               Temiz URL'ler, 301 yönlendirmeleri, HTTPS, önbellek, sıkıştırma
```

## Yerelde çalıştırma

```bash
npm install          # yalnızca ilk sefer
npm run css          # CSS'i derle (PHP/JS'de yeni Tailwind sınıfı kullandıysanız)
npm run serve        # http://localhost:8000
```

`?nopopup=1` parametresi popup'ı yalnızca yerel sunucuda gizler (ekran görüntüsü testi için).

## İçerik güncelleme

- **Adres / telefon / Instagram:** `includes/config.php` en üstteki sabitler. Değişiklik tüm sayfalara, şemaya ve haritaya otomatik yansır.
- **Hizmet ekleme/düzenleme:** `includes/config.php` → `SERVICES`
- **Galeriye fotoğraf ekleme:**
  1. Orijinal fotoğrafı `resources/originals/` klasörüne koyun.
  2. `resources/build-images.sh` içindeki `MAP` listesine `"dosya.jpeg|izmit-kuafor-aciklayici-ad"` satırını ekleyin.
  3. `bash resources/build-images.sh` çalıştırın (cwebp gerekir: `brew install webp`).
  4. `includes/config.php` → `GALLERY` listesine ad, açıklayıcı alt metin ve yerleşim (`tall` / `wide` / `square`) ekleyin.
- **Favicon / paylaşım görseli:** `php resources/build-icons.php`

## Yayına alma (Hostinger)

`public_html` içine şu dosya ve klasörler yüklenir:

```
*.php  .htaccess  robots.txt  site.webmanifest  favicon*  apple-touch-icon.png  assets/  includes/
```

`node_modules/`, `resources/` ve `package*.json` yüklenmez. Yanlışlıkla yüklenirse `.htaccess` onları dışarıya kapatır. PHP 8.0 veya üzeri gerekir.

## SEO notları

- Her sayfa sunucuda tam HTML olarak üretilir. Benzersiz `title`, `description`, `canonical`, Open Graph ve Twitter etiketleri vardır.
- Schema.org: `HairSalon` (adres, telefon, harita, Instagram, hizmet kataloğu), `WebSite`, sayfa türü + `BreadcrumbList`, hizmetler için `ItemList`, galeri için `ImageGallery`.
- Eski adresler 301 ile yönlenir: `/index.html` → `/`, `/x.php` → `/x`, `/x/` → `/x`, `/sitemap 2.xml` → `/sitemap.xml`, `www` → `https://matmazelizmit.com`.
