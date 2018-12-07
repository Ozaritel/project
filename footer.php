	</div>
	</div>
	<div class="footer2">
	<div class="payment-var">
		<div class="container">
			<p> Способы оплаты:</p>
			<div class="payment-image"></div>
		</div>
	</div>
	  <div class="footer">
	  	<div class="container">
		  	<div class="block-f">
		  		<div class="name-f">Категории</div>
		  		<div class="f-sections">Игровые ценности</div>
		  		<div class="f-sections">Услуги</div>
		  		<div class="f-sections">Личные аккаунты</div>
		  	</div>
		  	<div class="block-f">
		  		<div class="name-f">Информация</div>
		  		<div class="f-sections">О нас</div>
		  		<div class="f-sections">Как начать продавать?</div>
		  		<div class="f-sections">Как купить?</div>
		  		<div class="f-sections">Пользовательское соглашение</div>
		  	</div>
		  	<div class="block-f">
					<div class="f-sections"><a href="/profile/auth">Авторизация</a></div>
					<div class="f-sections"><a href="/profile/registration">Регистрация</a></div>
					<div class="f-sections"><a href="/profile/products/">Добавить товар</a></div>
					<div class="f-sections"><a href="/profile/withdrawal/">Вывод средств</a></div>
		  	</div>
		  	<div class="block-f">
		  		<div class="social-f">
		  			<div class="icon-f vk"></div>
		  			<div class="icon-f fb"></div>
		  			<div class="icon-f skype"></div>
		  		</div>
		  		<div class="metrika-f">
		  			<!-- Yandex.Metrika informer -->
							<a href="https://metrika.yandex.ru/stat/?id=48179714&amp;from=informer"
							target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/48179714/3_0_FDFD31FF_DDDD11FF_0_pageviews"
							style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="48179714" data-lang="ru" /></a>
							<!-- /Yandex.Metrika informer -->

							<!-- Yandex.Metrika counter -->
							<script type="text/javascript" >
							    (function (d, w, c) {
							        (w[c] = w[c] || []).push(function() {
							            try {
							                w.yaCounter48179714 = new Ya.Metrika({
							                    id:48179714,
							                    clickmap:true,
							                    trackLinks:true,
							                    accurateTrackBounce:true,
							                    webvisor:true
							                });
							            } catch(e) { }
							        });

							        var n = d.getElementsByTagName("script")[0],
							            s = d.createElement("script"),
							            f = function () { n.parentNode.insertBefore(s, n); };
							        s.type = "text/javascript";
							        s.async = true;
							        s.src = "https://mc.yandex.ru/metrika/watch.js";

							        if (w.opera == "[object Opera]") {
							            d.addEventListener("DOMContentLoaded", f, false);
							        } else { f(); }
							    })(document, window, "yandex_metrika_callbacks");
							</script>
							<noscript><div><img src="https://mc.yandex.ru/watch/48179714" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
							<!-- /Yandex.Metrika counter -->
		  		</div>
		  		<div class="help-f">
		  			Тех-поддержка:<br>
		  			support@playcoins.ru
		  		</div>
		  		<div class="users-f">
		  			Пользователей: <span><?
		  			$query=$db->query("SELECT id FROM users");
						$members=$query->rowCount();
						echo $members;
						$db = null;?></span>
		  		</div>
		  	</div>
		  	<div class="bottom-f">
		  		&copy;PLAYCOINS.RU - Площадка для продажи и покупки игровых ценностей | Соединение защищено SSL
		  	</div>
		  </div>
		  </div>
	  </div>
	</div>
	  <div class="back-popup newclass">
	  	<div class="popup">Все изменения сохранены!</div>
	  </div>
	  <div class="money-popup">
	  	<div class="contant-popup"><div class="popup-header">Подтверждение E-mail на сайте <span>PLAYCOINS.RU</span></div>
	  	E-mail указан неверно, возможно такой e-mail уже существует, либо отсутствуют символы '@' или '.' .Для того чтобы получить письмо с подтверждение введите корректный, и рабочий e-mail.
					<div class="close-popup"></div>
			</div>
	  </div>
	  <div class="email-popup">
	  	<div class="contant-popup"><div class="popup-header">Подтверждение E-mail на сайте <span><a href="http://playcoins.ru">PLAYCOINS.RU</a></span></div>На указанный e-mail было отправленно письмо, для подтверждения.<div class="close-email-popup"></div>
			</div>
		</div>
	</div>
	  </body>
</html>