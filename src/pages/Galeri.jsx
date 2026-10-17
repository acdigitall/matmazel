import { motion, AnimatePresence } from 'framer-motion';
import { useState } from 'react';
import image1 from '../assets/foto(1).jpeg';
import image2 from '../assets/foto(2).jpeg';
import image3 from '../assets/foto(3).jpeg';
import image4 from '../assets/foto(4).jpeg';
import image5 from '../assets/foto(5).jpeg';
import image6 from '../assets/foto(6).jpeg';
import image7 from '../assets/foto(7).jpeg';
import image8 from '../assets/foto(8).jpeg';
import image9 from '../assets/foto(9).jpeg';
import image10 from '../assets/foto10.jpeg';
import image11 from '../assets/foto11.jpeg';
import image12 from '../assets/foto12.jpeg';
import image13 from '../assets/foto13.jpeg';
import image14 from '../assets/foto114.jpeg';
import image15 from '../assets/foto15.jpeg';
import image16 from '../assets/foto16.jpeg';
import image17 from '../assets/foto.jpeg';

const Galeri = () => {
  const fadeInUp = {
    initial: { opacity: 0, y: 40 },
    animate: { opacity: 1, y: 0 },
    transition: { duration: 0.8, ease: [0.25, 0.1, 0.25, 1] }
  };

  const staggerContainer = {
    initial: { opacity: 0 },
    animate: {
      opacity: 1,
      transition: {
        staggerChildren: 0.1,
        delayChildren: 0.1
      }
    }
  };

  // Galeri öğeleri - farklı aspect ratio'lar için masonry layout
  const galleryItems = [
    { id: 1, image: image1, aspect: 'tall' },
    { id: 2, image: image2, aspect: 'wide' },
    { id: 3, image: image3, aspect: 'square' },
    { id: 4, image: image4, aspect: 'tall' },
    { id: 5, image: image5, aspect: 'wide' },
    { id: 6, image: image6, aspect: 'square' },
    { id: 7, image: image7, aspect: 'tall' },
    { id: 8, image: image8, aspect: 'wide' },
    { id: 9, image: image9, aspect: 'square' },
    { id: 10, image: image10, aspect: 'tall' },
    { id: 11, image: image11, aspect: 'wide' },
    { id: 12, image: image12, aspect: 'square' },
    { id: 13, image: image13, aspect: 'tall' },
    { id: 14, image: image14, aspect: 'wide' },
    { id: 15, image: image15, aspect: 'square' },
    { id: 16, image: image16, aspect: 'tall' },
    { id: 17, image: image17, aspect: 'wide' },
  ];

  const [selectedImage, setSelectedImage] = useState(null);

  return (
    <div className="py-32">
      {/* Hero Section */}
      <section className="container mx-auto px-6 mb-20">
        <motion.div
          className="max-w-5xl mx-auto text-center"
          initial="initial"
          animate="animate"
          variants={staggerContainer}
        >
          <motion.h1
              className="font-heading text-3xl md:text-5xl mb-8 tracking-wider font-light"
            variants={fadeInUp}
          >
            Galeri
          </motion.h1>
          <motion.div
            className="w-32 h-px bg-champagne mx-auto mb-12"
            variants={fadeInUp}
          />
          <motion.p
            className="text-white/60 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto font-light"
            variants={fadeInUp}
          >
            Çarpıcı dönüşümler ve güzel yaratımlar portföyümüzü keşfedin
          </motion.p>
        </motion.div>
      </section>

      {/* Gallery Grid */}
      <section className="container mx-auto px-6">
        <motion.div
            className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[10px]"
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={staggerContainer}
        >
          {galleryItems.map((item) => (
              <motion.div
                  key={item.id}
                  className={`overflow-hidden rounded-xl bg-white/5 border border-white/10 hover:border-champagne/50 transition-all duration-500 cursor-pointer group
          ${item.aspect === 'tall' ? 'row-span-12' :
                      item.aspect === 'wide' ? 'row-span-8' :
                          'row-span-10'}
        `}
                  variants={fadeInUp}
                  whileHover={{ scale: 1.02 }}
                  onClick={() => setSelectedImage(item)}
              >
                <div className="relative w-full h-full">
                  <img
                      src={item.image}
                      alt="matmazel izmit , izmit kadın kuaför"
                      className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                  />
                </div>
              </motion.div>
          ))}
        </motion.div>
      </section>

      {/* Instagram CTA */}
      <section className="mt-32 py-32 bg-gradient-to-b from-black to-[#0a0a0a] relative">
        <div className="absolute inset-0 border-t border-b border-white/5"></div>
        <div className="container mx-auto px-6 text-center">
          <motion.div
            initial="initial"
            whileInView="animate"
            viewport={{ once: true }}
            variants={fadeInUp}
          >
            <h2 className="font-heading text-4xl md:text-6xl mb-6 tracking-wider font-light">
              Çalışmalarımızı Takip Edin
            </h2>
            <div className="w-24 h-px bg-champagne mx-auto mb-8"></div>
            <p className="text-white/60 text-lg md:text-xl mb-12 max-w-2xl mx-auto font-light leading-relaxed">
              Instagram'da en son yaratımlarımızı ve dönüşümlerimizi görün
            </p>
            <a
              href="https://www.instagram.com/ekipmatmazelizmit"
              target="_blank"
              rel="noopener noreferrer"
              className="group inline-flex items-center space-x-3 px-10 py-4 border border-champagne/50 text-champagne hover:bg-champagne hover:text-black transition-all duration-500 tracking-wider text-sm font-light relative overflow-hidden"
            >
              <span className="relative z-10">Instagram'ımızı Ziyaret Et</span>
              <svg className="w-4 h-4 relative z-10 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9 5l7 7-7 7" />
              </svg>
              <div className="absolute inset-0 bg-champagne transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
            </a>
          </motion.div>
        </div>
      </section>

      {/* Image Modal */}
      <AnimatePresence>
        {selectedImage && (
          <motion.div
            className="fixed inset-0 bg-black/95 backdrop-blur-md z-50 flex items-center justify-center p-6"
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            exit={{ opacity: 0 }}
            onClick={() => setSelectedImage(null)}
          >
            <motion.div
              className="max-w-6xl max-h-full relative"
              initial={{ scale: 0.8, opacity: 0 }}
              animate={{ scale: 1, opacity: 1 }}
              exit={{ scale: 0.8, opacity: 0 }}
              transition={{ duration: 0.3 }}
              onClick={(e) => e.stopPropagation()}
            >
              <img
                src={selectedImage.image}
                alt="matmazel izmit , izmit kadın kuaför"
                className="max-w-full max-h-[90vh] object-contain border border-white/20"
              />
              <button
                className="absolute top-6 right-6 text-white/80 hover:text-white text-4xl font-light transition-colors"
                onClick={() => setSelectedImage(null)}
                aria-label="Kapat"
              >
                ×
              </button>
            </motion.div>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
};

export default Galeri;






