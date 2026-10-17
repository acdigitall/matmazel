import { motion } from 'framer-motion';
import { Link } from 'react-router-dom';
import Logo from './Logo';

const Footer = () => {
  const fadeInUp = {
    initial: { opacity: 0, y: 20 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.6 }
  };
  return (
    <footer className="bg-black border-t border-white/10 py-16 relative">
      <div className="absolute inset-0 border-t border-white/5"></div>
      <div className="container mx-auto px-6 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <Logo variant="minimal" className="mb-6" />
            <p className="text-white/50 text-sm tracking-wide leading-relaxed font-light max-w-xs">
              İzmit'te Premium Saç & Makyaj Stüdyosu. Hassasiyet ve sanatla hazırlanmış lüks güzellik hizmetleri.
            </p>
          </motion.div>
          
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <h3 className="font-heading text-sm tracking-wider mb-6 text-champagne font-light uppercase">Navigasyon</h3>
            <ul className="space-y-3 text-sm text-white/50">
              <li>
                <Link to="/" className="hover:text-champagne transition-colors duration-300 font-light">
                  Ana Sayfa
                </Link>
              </li>
              <li>
                <Link to="/hakkimizda" className="hover:text-champagne transition-colors duration-300 font-light">
                  Hakkımızda
                </Link>
              </li>
              <li>
                <Link to="/hizmetler" className="hover:text-champagne transition-colors duration-300 font-light">
                  Hizmetler
                </Link>
              </li>
              <li>
                <Link to="/galeri" className="hover:text-champagne transition-colors duration-300 font-light">
                  Galeri
                </Link>
              </li>
              <li>
                <Link to="/iletisim" className="hover:text-champagne transition-colors duration-300 font-light">
                  İletişim
                </Link>
              </li>
            </ul>
          </motion.div>
          
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <h3 className="font-heading text-sm tracking-wider mb-6 text-champagne font-light uppercase">İletişim</h3>
            <div className="space-y-4 mb-6">
              <a
                href="https://maps.google.com/?q=Karabaş+mah.+Süleymanpaşa+sokak+No:1+Zemin+kat+D+:6+İzmit/KOCAELİ"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-start space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group"
              >
                <div className="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center flex-shrink-0">
                  <svg className="w-5 h-5 text-champagne" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <span className="font-light text-xs text-white/70 group-hover:text-champagne transition-colors leading-relaxed pt-1">
                  Karabaş mah. Süleymanpaşa sokak No:1 Zemin kat D :6 İzmit/KOCAELİ
                </span>
              </a>

              <a
                href="https://www.instagram.com/ekipmatmazelizmit"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-center space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group"
                aria-label="Instagram"
              >
                <div className="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                  <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                  </svg>
                </div>
                <span className="font-light">@ekipmatmazelizmit</span>
              </a>
              
              <a
                href="https://wa.me/905307003557"
                target="_blank"
                rel="noopener noreferrer"
                className="flex items-center space-x-3 text-white/50 hover:text-champagne transition-colors duration-300 group"
                aria-label="WhatsApp"
              >
                <div className="w-10 h-10 border border-white/10 group-hover:border-champagne/50 transition-colors duration-300 flex items-center justify-center">
                  <svg className="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                  </svg>
                </div>
                <span className="font-light">WhatsApp</span>
              </a>
            </div>
            <div className="w-full h-48 md:h-64 rounded overflow-hidden border border-white/10">
              <iframe
                  src="https://maps.google.com/maps?q=Karaba%C5%9F+Mahallesi+S%C3%BCleymanpa%C5%9Fa+Sokak+No+1+Izmit+Kocaeli&t=&z=16&ie=UTF8&iwloc=&output=embed"
                  width="100%"
                  height="100%"
                  style={{ border: 0 }}
                  allowFullScreen={true}
                  loading="lazy"
                  referrerPolicy="no-referrer-when-downgrade"
                  className="opacity-80 hover:opacity-100 transition-opacity duration-300"
                  title="MATMAZEL Kuaför Konum"
              ></iframe>
            </div>

          </motion.div>
        </div>
        
        <div className="border-t border-white/5 pt-8 text-center">
          <a href='https://acdigital.tech/' className="text-white/30 text-xs tracking-wider font-light">
            &copy; {new Date().getFullYear()} AC DIGITAL. Tüm hakları saklıdır.
          </a>
        </div>
      </div>
    </footer>
  );
};

export default Footer;






