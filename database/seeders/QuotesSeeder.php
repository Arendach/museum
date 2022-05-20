<?php

namespace Database\Seeders;

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuotesSeeder extends Seeder
{
    private array $quotes = [
        [
            'title'     => 'Коли поміж хлібом і свободою народ обирає хліб, він зрештою втрачає все, в тому числі і хліб. Якщо народ обирає свободу, він матиме хліб, вирощений ним самим і ніким не відібраний.',
            'title_ru'  => 'Когда среди хлеба и свободы народ выбирает хлеб, он в конце концов теряет все, в том числе и хлеб. Если народ избирает свободу, у него будет хлеб, выращенный им самим и никем не отнятый.',
            'title_en'  => 'When the people choose bread between bread and freedom, they eventually lose everything, including bread. If the people choose freedom, they will have bread grown by themselves and not taken away by anyone.',
            'people_id' => 1
        ],
        [
            'title'     => 'Хто будує на невластивих для нашого ґрунту світоглядових підвалинах, той, навіть при добрій волі й найкращих намаганнях, не поставить нічого тривкого, тільки помножить руїни.',
            'title_ru'  => 'Кто строит на несвойственных для нашей почвы мировоззренческих устоях, тот, даже при доброй воле и лучших стараниях, не поставит ничего прочного, только умножит руины.',
            'title_en'  => 'He who builds on worldview foundations that are not peculiar to our soil, he, even with good will and the best efforts, will not put anything lasting, only multiply the ruins.',
            'people_id' => 1,
        ],
        [
            'title'     => 'Без власної держави, без визволення, отже і без визвольної боротьби, Україна не може мати ані свободи, ані добробуту, ані якої-небудь тіні демократії.',
            'title_ru'  => 'Без собственного государства, без освобождения, а значит и без освободительной борьбы, Украина не может иметь ни свободы, ни благосостояния, ни какой-либо тени демократии.',
            'title_en'  => 'Without its own state, without liberation, and therefore without the liberation struggle, Ukraine can have neither freedom, nor prosperity, nor any shadow of democracy.',
            'people_id' => 1,
        ],
        [
            'title'     => 'Ні на що не здадуться навіть найкращі нагоди й готовність допомогти, якщо сама нація не виборює й не кує своєї долі власною боротьбою. – Комунізм цілком противний духові української нації.',
            'title_ru'  => 'Ні на що не здадуться навіть найкращі нагоди й готовність допомогти, якщо сама нація не виборює й не кує своєї долі власною боротьбою. – Комунізм цілком противний духові української нації.',
            'title_en'  => 'Even the best opportunities and willingness to help will not give up if the nation itself does not fight and forge its own destiny by its own struggle. - Communism is completely contrary to the spirit of the Ukrainian nation.',
            'people_id' => 1,
        ],
        [
            'title'     => 'Якщо завтра на зміну большевизмові прийде інша форма російського імперіялізму, то він так само насамперед звернеться всіма своїми силами проти самостійности України, на її поневолення. Російський народ, як і досі, буде нести той імперіялізм, робитиме все, щоб тримати Україну в поневоленні.',
            'title_ru'  => 'Если завтра на смену большевизму придет другая форма российского империализма, то он также прежде всего обратится всеми своими силами против самостоятельности Украины, на ее порабощение. Российский народ, как до сих пор, будет нести тот империализм, будет делать все, чтобы держать Украину в порабощении.',
            'title_en'  => 'If Bolshevism is replaced tomorrow by another form of Russian imperialism, it will also, in the first place, turn with all its might against the independence of Ukraine and its enslavement. The Russian people, as before, will bear that imperialism, will do everything to keep Ukraine in captivity.',
            'people_id' => 1,
        ],
        [
            'title'     => 'Основна частина боротьби революційної організації з ворогом — це і є боротьба за душу людини, за ідейний вплив на цілий нарід, за поширення ідеї й концепції визвольної революції серед найширших мас народу, захоплення їх цією ідеєю і через це приєднання їх на бік визвольної боротьби.',
            'title_ru'  => 'Основная часть борьбы революционной организации с врагом — это и есть борьба за душу человека, за идейное влияние на целый народ, за распространение идеи и концепции освободительной революции среди самых широких масс народа, увлечение их этой идеей и присоединение их на сторону освободительной борьбы.',
            'title_en'  => 'The main part of the struggle of the revolutionary organization against the enemy is the struggle for the human soul, for ideological influence on the whole nation, for spreading the idea and concept of the liberation revolution among the broadest masses of the people, their enthusiasm for this idea.',
            'people_id' => 1,
        ],
        [
            'title'     => 'З москалями нема спільної мови.',
            'title_ru'  => 'С москалями нет общего языка.',
            'title_en'  => 'There is no common language with the Muscovites.',
            'people_id' => 1,
        ],

        [
            'title'     => 'Мудрого — не одурити, чесного — не купити, мужнього — не зламати.',
            'title_ru'  => 'Мудрого – не обмануть, честного – не купить, мужественного – не сломать.',
            'title_en'  => 'Wise - do not be fooled, honest - do not buy, courage - do not break.',
            'people_id' => 2
        ],
        [
            'title'     => 'Гітлер — напівінтелігент, зарозумілий «юберменш» і дуже короткозорий.',
            'title_ru'  => 'Гитлер — полуинтеллигент, высокомерный «юберменьший» и очень близорукий.',
            'title_en'  => 'Hitler is a semi-intellectual, arrogant "ubermensch" and very short-sighted.',
            'people_id' => 2
        ],
        [
            'title'     => 'Самостійність здобуде не одна партія чи організація, чи окремі Люди, здобуде її тільки ціла Україна.',
            'title_ru'  => 'Самостоятельность обретет не одна партия или организация, или отдельные люди, обретет ее только целая Украина.',
            'title_en'  => 'Not one party or organization or individual people will gain independence, only the whole of Ukraine will gain it.',
            'people_id' => 2
        ],
        [
            'title'     => 'Ми усі — вояки УПА і всі підпільники зокрема, і я — свідомі, що раніше чи пізніше нам доведеться згинути в боротьбі з брутальною силою. Але, запевняю вас, — ми не будемо боятися вмирати, бо, вмираючи, будемо свідомі того, що станемо добривом української землі. Це наша рідна земля потребує ще багато добрива, щоб у майбутньому виросла на ній нова українська генерація, яка довершить те, що нам не суджено було довершити.',
            'title_ru'  => 'Есть все UPA борцы и все подъемные бойцы в особый, и мы можем сказать, что молодец или последний будет иметь дело в борьбе против пустой силы. Однако, я имею в виду, что мы не будем вдохновляться, потому что если мы будем, мы будем думать, что мы будем принимать участие в украинском городе. Это настоящий город, который нуждается в множестве fertilizer, если в будущем новом украинском генерации будет расти на нем, кто должен быть установлен, когда мы не должны были установить.',
            'title_en'  => 'We are all UPA soldiers and all underground fighters in particular, and I am aware that sooner or later we will have to die in the fight against brutal force. But, I assure you, we will not be afraid to die, because when we die, we will be aware that we will become a fertilizer of the Ukrainian land. This is our native land that needs a lot of fertilizer so that in the future a new Ukrainian generation will grow up on it, which will complete what we were not destined to complete.',
            'people_id' => 2
        ],
    ];


    public function run(): void
    {
        if (Quote::count()) {
            return;
        }

        foreach ($this->quotes as $quote) {
            Quote::create($quote);
        }
    }
}
