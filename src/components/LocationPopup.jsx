import { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import popupImg from '../assets/yeni-lokasyon-popup.jpeg';

const LocationPopup = () => {
  const [isOpen, setIsOpen] = useState(false);

  useEffect(() => {
    // İlk girişte popup'ı aç (oturum boyunca bir kez gösterilir)
    const hasSeenPopup = sessionStorage.getItem('matmazel_location_popup_seen');
    if (!hasSeenPopup) {
      const timer = setTimeout(() => {
        setIsOpen(true);
      }, 400);
      return () => clearTimeout(timer);
    }
  }, []);

  const handleClose = () => {
    sessionStorage.setItem('matmazel_location_popup_seen', 'true');
    setIsOpen(false);
  };

  // ESC tuşu ile kapatma ve arka plan scroll kilidi
  useEffect(() => {
    const handleKeyDown = (e) => {
      if (e.key === 'Escape') {
        handleClose();
      }
    };

    if (isOpen) {
      window.addEventListener('keydown', handleKeyDown);
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = 'unset';
    }

    return () => {
      window.removeEventListener('keydown', handleKeyDown);
      document.body.style.overflow = 'unset';
    };
  }, [isOpen]);

  return (
    <AnimatePresence>
      {isOpen && (
        <div className="fixed inset-0 z-[100] flex items-center justify-center p-3 sm:p-6 overflow-y-auto">
          {/* Karartmalı ve blur arka plan */}
          <motion.div
            className="fixed inset-0 bg-black/85 backdrop-blur-md"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            transition={{ duration: 0.3 }}
            onClick={handleClose}
          />

          {/* Popup Kartı */}
          <motion.div
            className="relative z-10 w-full max-w-2xl bg-[#0d0d0d] border border-champagne/40 rounded-2xl shadow-2xl overflow-hidden flex flex-col my-auto"
            initial={{ opacity: 0, scale: 0.9, y: 20 }}
            animate={{ opacity: 1, scale: 1, y: 0 }}
            exit={{ opacity: 0, scale: 0.9, y: 20 }}
            transition={{ type: 'spring', damping: 25, stiffness: 300 }}
          >
            {/* Üst Başlık ve Kapatma Butonu */}
            <div className="flex items-center justify-between px-4 sm:px-6 py-3.5 border-b border-white/10 bg-black/70">
              <div className="flex items-center space-x-2">
                <span className="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span className="text-xs uppercase tracking-widest text-champagne font-light">
                  Yeni Salonumuza Taşındık
                </span>
              </div>
              <button
                onClick={handleClose}
                className="w-8 h-8 rounded-full border border-white/20 hover:border-champagne text-white/70 hover:text-champagne flex items-center justify-center transition-colors duration-300"
                aria-label="Kapat"
              >
                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            {/* Kroki ve Duyuru Görseli */}
            <div className="bg-white p-2 sm:p-3 flex items-center justify-center">
              <img
                src={popupImg}
                alt="Matmazel Yeni Salon Lokasyon Kroki ve Duyuru"
                className="w-full h-auto max-h-[68vh] object-contain rounded-lg"
              />
            </div>

            {/* Alt İşlem Butonları */}
            <div className="p-3.5 sm:p-4 bg-[#0a0a0a] border-t border-white/10 flex flex-col sm:flex-row gap-3 items-center justify-between">
              <div className="flex flex-wrap gap-2.5 w-full sm:w-auto">
                <a
                  href="https://maps.google.com/?q=Karabaş+mah.+Süleymanpaşa+sokak+No:1+Zemin+kat+D+:6+İzmit/KOCAELİ"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex-1 sm:flex-initial inline-flex items-center justify-center space-x-2 px-4 py-2.5 bg-champagne text-black text-xs font-medium tracking-wider uppercase hover:bg-champagne/90 transition-all duration-300 rounded"
                >
                  <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <span>Yol Tarifi Al</span>
                </a>

                <a
                  href="https://www.instagram.com/ekipmatmazelizmit"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex-1 sm:flex-initial inline-flex items-center justify-center space-x-2 px-4 py-2.5 border border-white/20 hover:border-champagne text-white/80 hover:text-champagne text-xs font-light tracking-wider transition-all duration-300 rounded"
                >
                  <span>Instagram</span>
                </a>
              </div>

              <button
                onClick={handleClose}
                className="w-full sm:w-auto text-xs text-white/50 hover:text-white transition-colors duration-300 py-1 sm:py-0 font-light underline underline-offset-4"
              >
                Siteye Devam Et
              </button>
            </div>
          </motion.div>
        </div>
      )}
    </AnimatePresence>
  );
};

export default LocationPopup;
