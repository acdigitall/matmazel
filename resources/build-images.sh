#!/usr/bin/env bash
# Kaynak fotoğrafları (resources/originals) SEO dostu adlarla WebP'ye çevirir.
# Kullanım: bash resources/build-images.sh
# Gerekenler: cwebp (brew install webp), sips (macOS)
set -euo pipefail
cd "$(dirname "$0")/.."

SRC=resources/originals
OUT=assets/img
mkdir -p "$OUT"

# kaynak|hedef-ad
MAP=(
  "foto(1).jpeg|izmit-kuafor-kullu-kumral-balyaj-1"
  "foto(2).jpeg|izmit-kuafor-kullu-kumral-balyaj-2"
  "foto(3).jpeg|izmit-kuafor-dalgali-fon-balyaj"
  "foto(4).jpeg|izmit-kuafor-sari-balyaj-dalgali-sac-1"
  "foto(5).jpeg|izmit-kuafor-sari-balyaj-dalgali-sac-2"
  "foto(6).jpeg|izmit-kuafor-kisa-kesim-kahve-sac"
  "foto(7).jpeg|izmit-kuafor-platin-sari-katli-kesim-1"
  "foto(8).jpeg|izmit-kuafor-platin-sari-katli-kesim-2"
  "foto(9).jpeg|izmit-kuafor-sari-perdeli-kesim"
  "foto10.jpeg|izmit-kuafor-bakir-kahve-balyaj"
  "foto11.jpeg|izmit-kuafor-koyu-kahve-dalgali-sac"
  "foto12.jpeg|izmit-kuafor-bal-sarisi-balyaj"
  "foto13.jpeg|izmit-kuafor-kullu-sari-balyaj-perdeli-kesim"
  "foto114.jpeg|izmit-kuafor-kahve-katli-kesim"
  "foto15.jpeg|izmit-kuafor-kullu-ombre-katli-kesim"
  "foto16.jpeg|izmit-kuafor-kullu-sari-ombre"
  "foto.jpeg|izmit-kuafor-karamel-balyaj-uzun-sac"
  "gelin.jpeg|izmit-gelin-saci-ve-makyaji"
  "makyaj.jpeg|izmit-profesyonel-makyaj"
  "kesim.jpeg|izmit-kuafor-uzun-katli-sac-kesimi"
  "icmekan.jpeg|matmazel-izmit-salon-ic-mekan"
  "yeni-lokasyon-popup.jpeg|matmazel-izmit-yeni-salon-kroki"
)

for entry in "${MAP[@]}"; do
  src="$SRC/${entry%%|*}"
  name="${entry##*|}"
  srcw=$(sips -g pixelWidth "$src" | awk '/pixelWidth/{print $2}')
  for w in 600 1200; do
    rw=$(( w < srcw ? w : srcw ))   # asla büyütme
    cwebp -quiet -q 78 -m 6 -metadata none -resize "$rw" 0 "$src" -o "$OUT/$name-$w.webp"
  done
done

# Logo (şeffaf PNG, header/footer için küçük boy)
sips -s format png -Z 160 "$SRC/logo-white.png" --out "$OUT/matmazel-logo-beyaz.png" >/dev/null
cwebp -quiet -q 90 -alpha_q 100 -resize 160 0 "$SRC/logo-white.png" -o "$OUT/matmazel-logo-beyaz.webp"

# Schema / sosyal medya için koyu logo (beyaz zemin)
cp "$SRC/matmazel-logo.jpg" "$OUT/matmazel-logo.jpg"

echo "Görseller hazır: $OUT"
