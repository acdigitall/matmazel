import { motion } from 'framer-motion';
import logoImage from '../assets/logo-white.png';

const Logo = ({ className = '', variant = 'default' }) => {
  // Logo görselini kullan
  const logoVariants = {
    default: (
      <div className={`flex items-center space-x-3 ${className}`}>
        {/* Logo görseli */}
        <div className="relative w-12 h-12 md:w-16 md:h-16">
          <img
            src={logoImage}
            alt="matmazel izmit , kadın kuaför , izmit kadın kuaförü"
            className="w-full h-full object-contain"
          />
        </div>
        {/* Text */}
        <div className="font-heading text-xl md:text-2xl font-light tracking-wider text-white">
          MATMAZEL
        </div><span>{" "}</span>|
          <div className="font-heading text-sm font-light tracking-wider text-white">
              İZMİT
          </div>
      </div>
    ),
    minimal: (
      <div className={`flex items-center space-x-2 ${className}`}>
        <div className="relative w-10 h-10 md:w-12 md:h-12">
          <img
            src={logoImage}
            alt="matmazel izmit , kadın kuaför , izmit kadın kuaförü"
            className="w-full h-full object-contain"
          />
        </div>
        <div className="font-heading text-lg md:text-xl font-light tracking-wider text-white">
          MATMAZEL
        </div>
          <span>{" "}</span>|
          <div className="font-heading text-sm md:text-sm font-light tracking-wider text-white">
              İZMİT
          </div>
      </div>
    ),
    icon: (
      <div className={`relative w-10 h-10 md:w-12 md:h-12 ${className}`}>
        <img
          src={logoImage}
          alt="matmazel izmit , kadın kuaför , izmit kadın kuaförü"
          className="w-full h-full object-contain"
        />
      </div>
    ),
  };

  return (
    <motion.div
      initial={{ opacity: 0, scale: 0.9 }}
      animate={{ opacity: 1, scale: 1 }}
      transition={{ duration: 0.6, ease: 'easeOut' }}
    >
      {logoVariants[variant] || logoVariants.default}
    </motion.div>
  );
};

export default Logo;

